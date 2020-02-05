<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return "Hello World from my TestController";
    }
    
    public function testView() {
        return view('helloworld');
    }
}
