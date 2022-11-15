<?php

namespace App\Http\Controllers;

class SerialController extends Controller
{

    public function switch($id){
        
        shell_exec("C:\...\python.exe C:\...\switch.py $id");
    }
    
}
