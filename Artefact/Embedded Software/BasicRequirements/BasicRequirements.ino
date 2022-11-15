/*
 * Hi Barry.  
 * This embedded software fulfils the basic requirements for the embedded system.
 * Please let me know if any of the function or variable names need to be changed,
 * or if I should write more comments in certain areas.
 * 
 * Program storage usage: 40%
 * Dynamic Memory usage by globals: 53%
 * 
 * Please find attached the wiring diagram
 * 
 * Note: I've only made 3 'jobs' but I can make more if needs be
 *       There is no way of changing the time on this without getting it from a PC, let 
 *       me know if a way to change the date/time on the system is necessary 
 * 
 * Daniel
 */

#include <TimeLib.h>
#include <LiquidCrystal.h>
#include <DS1307RTC.h>
#include <ezButton.h>

/*
 * CONSTANTS
 */

//relay output on pin D6
const int relay = 6;

//Strings to indicate if job is working or not
const String jobStatus[2] = {
  "Inactive", "Active  "
  }; 


//names of months for displaying 
const char *monthName[12] = {
  "Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
};

//mode names
const String modes[3] = {
  "OFF  ", "ON   ", "TIMED"
};

//location of the cursor on screen when editing job aspects
const byte locations[7][2] = {
  {6, 0}, //active/inactive
  {4, 1}, //on hour
  {5, 1}, //on 10 min
  {6, 1}, //on min
  {13, 1},//off hour
  {14, 1},//off 10 min
  {15, 1} //off min
};

//pins for lcd
const int rs = 12, en = 11, d4 = 5, d5 = 4, d6 = 3, d7 = 2;

//lcd obj
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);

//init time structure for RTC
tmElements_t tm;

//init EzButton objects 
ezButton b1(7);
ezButton b2(8);
ezButton b3(9);
ezButton b4(10);

//package buttons into an array
ezButton buttons[4] = {b1, b2, b3, b4};

/*
 * VARIABLES
 */

//unix time of previous timer checking
//limits cheching if relay should be on to once per second
long previousTime = 0;

//i is for loops
//mode is 0->off, 1->on, 2->timed
//menu is 0->default time display 1,2,3 -> job displays
int i, mode = 0, menu = 0;

//determines which job paramater is currently being edited
byte editing = 0;

//time pairs [on time, off time, active/inactive]
int pairs[3][3] = {
  {
    1400, 1500, 1
  },
  {
    1401, 1501, 0
  },
  {
    1402, 1502, 1
  }
};

//decides if plug should be on at this time
bool scheduled = false;

//used so menus aren't updated during editing
//equivalent to a 'screen refresh' tag
bool newMenu = true; 

/*
 * Controls updating behaviour of plug based on mode value
 * Mode is global so it doesn't need to be passed through
 */
void toggle(){
    //cycle mode between 0, 1, 2
    if(mode < 2){
      mode++;
    }
    else{
      mode = 0;
    }
  switch (mode){
    case 0://off
      digitalWrite(relay, LOW);
      break;
    case 1://on
      digitalWrite(relay, HIGH);
      break;
    case 2://timed
      //logic is managed in main loop
      break;
    default: //if something goes wrong
      Serial.println("MODE ERROR: Mode value set to " + String(mode));
      //reset mode to off for safety
      mode = 0;
    }
}



/*
 * Changes the times and status of jobs 
 * @param job:int     the job that is being changed [0-2]
 * @param value:byte  the component of the job being changed [0-6] 
 *                    (indicated beside respective case statements)
 */
void edit(int job, byte value){
  int *thisJob = pairs[job];
  switch (value){
    case 0://changing whether job is activated or not
      thisJob[2] = 1 - thisJob[2];//flips the integer between 0 and 1
      break;
    case 1://changing ON hour
      if(thisJob[0] >= 2300){ //if on 23 hours
        thisJob[0] -= 2300; //bring to 00 hours
      }else{
        thisJob[0] += 100;
      }
      break;
    case 2: //changing ON 10m
      if(thisJob[0] % 100 >=50){ //if at 50 mins
        thisJob[0] -= 50; //back to XX0X 
      }else{
        thisJob[0] += 10;
      }
      break;
    case 3: //changing ON m
      if(thisJob[0] % 10 == 9){ //if at XXX9 hours
        thisJob[0] -= 9; //back to XXX0
      }else{
        thisJob[0]++;
      }
      break;
    case 4: //changing OFF hour
      if(thisJob[1] >= 2300){ //if on 23 hours
        thisJob[1] -= 2300; //bring to 00 hours
      }else{
        thisJob[1] += 100;
      }
      break;
    case 5: //changing OFF 10m
      if(thisJob[1] % 100 >=50){ //if at 50 mins
        thisJob[1] -= 50; //back to XX0X 
      }else{
        thisJob[1] += 10;
      }
      break;
    case 6: //changing OFF m
      if(thisJob[1] % 10 == 9){ //if at XXX9 hours
        thisJob[1] -= 9; //back to XXX0
      }else{
        thisJob[1]++;
      }
      break;
  }

  //failsafe as overnight jobs wont work with this version
  //if off time is before on time, force job to be inactive
  if(thisJob[1] < thisJob[0]){
    thisJob[2] = 0;
  }
}

//used to configure the RTC chip to time on computer during setup
bool getTime(const char *str)
{
  int Hour, Min, Sec;

  if (sscanf(str, "%d:%d:%d", &Hour, &Min, &Sec) != 3) return false;
  tm.Hour = Hour;
  tm.Minute = Min;
  tm.Second = Sec;
  return true;
}
//same but for date
bool getDate(const char *str)
{
  char Month[12];
  int Day, Year;
  uint8_t monthIndex;

  if (sscanf(str, "%s %d %d", Month, &Day, &Year) != 3) return false;
  for (monthIndex = 0; monthIndex < 12; monthIndex++) {
    if (strcmp(Month, monthName[monthIndex]) == 0) break;
  }
  if (monthIndex >= 12) return false;
  tm.Day = Day;
  tm.Month = monthIndex + 1;
  tm.Year = CalendarYrToTm(Year);
  return true;
}
/*
 * Put a 0 in front of 2 digit numbers less than 10
 * @param number:int the number intended to be 2 digits long [0-99]
 * 
 * @return String representing number in 2 digits
 */
String show2digits(int number) {
  if (number >= 0 && number < 10) {
    return "0" + String(number);
  }
  //no change
  return String(number);
}
/*
 * Put leading zeros before 4 digit numbers less than 1000
 * @param number:int number intended to be 4 digits long [0-9999]
 *                ->will not be more than 2359 in this application
 * 
 * @return String reresenting number in 4 digits
 */
String show4digits(int number) {
  byte left = number / 100; //left 2 digits of a 4-digit decimal
  byte right = number % 100;//right 2 digits of a 4-digit decimal
  return show2digits(left) + show2digits(right);
}

/*
 * Setup function of Arduino
 * Called on startup of the chip
 */

void setup() {

  //configure RTC with date and time
  bool parse=false;
  bool config=false;
  // get the date and time the compiler was run
  if (getDate(__DATE__) && getTime(__TIME__)) {
    parse = true;
    // and configure the RTC with this info
    if (RTC.write(tm)) {
      config = true;
    }
  }
  
  //set debounce time for all buttons
  for(i = 0; i < 4; i++){
    buttons[i].setDebounceTime(50);
  }
  
  //init previous time
  previousTime = RTC.get();
  
  //init lcd
  lcd.begin(16, 2);
  lcd.cursor();
  //init relay pin 
  pinMode(relay, OUTPUT);

  //init Serial communication
  Serial.begin(9600);

  while (!Serial) ; // wait for Arduino Serial Monitor
  delay(200);

  //If RTC configured correctly, indicate on Serial Monitor
  if (parse && config) {
    Serial.print("DS1307 configured Time=");
    Serial.print(__TIME__);
    Serial.print(", Date=");
    Serial.println(__DATE__);
  } else if (parse) {
    Serial.println("DS1307 Communication Error :-{");
    Serial.println("Please check your circuitry");
  } else {
    Serial.print("Could not parse info from the compiler, Time=\"");
    Serial.print(__TIME__);
    Serial.print("\", Date=\"");
    Serial.print(__DATE__);
    Serial.println("\"");
  }
}

//reads time from RTC, displays on lcd
void displayTime(){

  //display mode
  lcd.setCursor(10, 0);
  lcd.print(modes[mode]);
  
  //get structured time from RTC 
  RTC.read(tm);

  
  //display date and time on screen
  lcd.setCursor(0, 0);
  lcd.print(tm.Day);
  lcd.print("/");
  lcd.print(monthName[tm.Month - 1]);
  lcd.print("/");
  // tm.Year gives years since 1970, this is more efficient than getting a two digit value by calculating the actual year and then string manipulation
  lcd.print(tm.Year - 30); 
  //show time placeholder
  lcd.setCursor(0, 1);
  lcd.print("Time: ");
  //show time
  lcd.setCursor(6, 1);
  lcd.print(show2digits(tm.Hour) + ":" + show2digits(tm.Minute) + ":" + show2digits(tm.Second));

  
  //display current mode
  lcd.setCursor(10, 0);
  lcd.print(modes[mode]);

  newMenu = false;
}

/*
 * Displays screen for job editing mode
 * 
 * @param job:int the index of the job being displayed in the pairs[] array
 */
void displayJob(int job){
   lcd.setCursor(0, 0);
   lcd.print("Job " + String(job + 1) + " "); //6 chars
   lcd.print(jobStatus[pairs[job][2]]);
   lcd.setCursor(0, 1);
   lcd.print("ON:" + show4digits(pairs[job][0]) + " OFF:" + show4digits(pairs[job][1]));

   //get the location of the job aspect being edited on the screen
   lcd.setCursor(locations[editing][0], locations[editing][1]);
   newMenu = false;
}

/*
 * Loop function of Arduino
 * Called repeatedly while chip is powered on
 */
void loop() {
  //Update the 4 buttons
  for(i = 0; i < 4; i++){
    buttons[i].loop();
  }

  //change job aspect which is currently selected
  //menu - 1 is the job in question
  //editing is which value is being incremented
  if(buttons[0].isPressed()){
    edit(menu - 1, editing);
    newMenu = true;
  }

  //cycle through which job aspect is selected for editing
  //max value is 6
  if( buttons[1].isPressed() ) {
    if(editing < 6){
      editing++;
    }else{
      editing = 0;
    }
    newMenu = true;
  }
  
   //switches between menu screens
   if(buttons[2].isPressed()){
    lcd.clear();
    if(menu < 3){
      menu++;
    }else{
      menu = 0;
    }
    newMenu = true;
  }

  //toggle button cycles through mode (3 possible values)
  //on-off-timed changer
  if(buttons[3].isPressed()){
    toggle();
  }

   /*
    * Screen logic
    * 0 is default screen. Shows date, mode, time
    * 1-3 are jobs
    * TODO: potentially add time editing menu
    */
   if(menu == 0){
      lcd.noCursor();
      displayTime();
   }else if (newMenu){
      lcd.cursor();
      displayJob(menu - 1);
   }

  //called every second when mode is timed (2)
  //this is more efficient, stops looping through every job every cycle
  if(RTC.get() > previousTime && mode == 2){
    int currentTime = tm.Hour * 100 + tm.Minute; //comparison variable formatted like this so it's easier to set and store alarms
    scheduled = false; //if this is true, then the plug should be on if timed
    //sizeof returns mem usage of a variable. Array size/element size is number of elements in array
    for(i = 0; i < sizeof(pairs)/sizeof(pairs[0]); i++){ //for each time pair
      //if the current time is within the schedule pairs, and the said time is activated
      //TODO: invert comparisons if off time is before on time (overnight jobs)
      if(currentTime >= pairs[i][0] && currentTime < pairs[i][1] && pairs[i][2] == 1){ 
        scheduled = true;
        break;
        }
      }
      //write to relay whether it is supposed to be on at this time or not
      digitalWrite(relay, scheduled);
      //reset previousTime()
      previousTime = RTC.get();
   }

}
