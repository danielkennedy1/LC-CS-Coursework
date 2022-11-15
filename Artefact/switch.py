import serial
import time
import sys

serialcomm = serial.Serial('COM3', 9600)
serialcomm.timeout = 1

time.sleep(2)

if sys.argv[1] == "0":
    serialcomm.write('off\n'.encode())
elif sys.argv[1] == "1":
    serialcomm.write('on\n'.encode())

time.sleep(0.5)

print(serialcomm.readline().decode('ascii'))