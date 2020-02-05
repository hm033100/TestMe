<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsMyNameController extends Controller
{
    public function index(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        echo "Your name is: " . $firstname . " " . $lastname;
        echo '<br>';
        
        $data = ['firstname' => $firstname, 'lastname' => $lastname];
        return view('thatswhoiam')->with($data);
    }
}
