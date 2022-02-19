<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('index');
});

Route::get('/join',function (){
   return view('join');
});

Route::post('/join',function (Request $request){
    $name=$request->name;
    $email=$request->email;
    $phone=$request->phone;
    $city=$request->city;
    $password=$request->password;
    $confirm_password=$request->confirm_password;

    $message="";
    $error=true;
    $join_complete=false;

    if(!$name){
        $message="Please enter your name";
    }
    else if(!$email){
        $message="Email address is required.";
    }
    else if(!$phone){
        $message="Phone Number is required for contact purpose.";
    }
    else if(!$city){
        $message="City is required for funds and meetings etc.";
    }
    else if(!$password){
        $message="Please enter password";
    }
    else if(!$confirm_password){
        $message="Please confirm password.";
    }
    else if(strlen($password)<8){
        $message="Password must be at least 8 characters.";
    }
    else if (!preg_match("#[0-9]+#", $password)) {
        $message = "Password must include at least one number!";
    }
    else if (!preg_match("#[a-z]+#", $password)) {
        $message = "Password must include at least one letter!";
    }
    else if (!preg_match("#[A-Z]+#", $password)) {
        $message = "Password must include at least one capital letter!";
    }
    else if($password!=$confirm_password){
        $message="Password does not match confirm password.!";
    }
    else
    {
        $error=false;
        $message="everthing seems fine.";
        $join_complete=true;

    }
    return view('join', [
        "msg"=>$message,
        "iserror"=>$error,
            "join_complete"=>$join_complete
        ]
    );

});
