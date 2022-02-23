<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function loginPage(Request $request){
        $user_id=$request->session()->get('user_id');
        if($user_id){
            return redirect('/dashboard');
        }
        else{
            return view('login',['iserror'=>false,'msg'=>'']);
        }

    }
    public function login(Request $request){
        $email=$request->email;
        $password=$request->password;

        $msg="";
        $success=false;

        if(!$email){
            $msg="Please enter email";
        }
        else if(!$password){
            $msg="Password is required.";
        }
        else{
            $user=User::where('email',$email)->first();
            if($user){
                $pwd=$user->password;

                $newLogin=new LoginHistory();
                $newLogin->email=$email;
                $newLogin->ip=$request->ip();
                $newLogin->user_agent=$request->userAgent();

                 $hourago=Carbon::now()->subHour()->toDateTimeString();

                $failedlogins=LoginHistory::where('ip',$request->ip())
                    ->orwhere('email',$email)
                    ->where('status','failed')
                    ->where('created_at',$hourago)
                    ->count();

                if($failedlogins>=5) {
                    $msg="You have failed to login for 5 times. Please try again after 1 hour.";
                }
                else{
                    if(Hash::check($password,$pwd)){
                        $request->session()->put('user_id',$user->id );
                        $success=true;
                        $newLogin->status="success";

                    }
                    else{
                        $msg="Invalid Password";
                        $newLogin->status="failed";
                    }
                    $newLogin->save();
                }
            }else{
                $msg="This email is not registered in our system.";
            }
        }
        if($success)
        {
            return redirect('/dashbaord');
        }
        else{
            return view('login',['iserror'=>true,'msg'=>$msg]);

        }
    }
    public function joinPage(Request $request){
        return view('join',["join_complete"=>false]);

    }
    public function join(Request $request){
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


            $user=new User();
            $user->name=$name;
            $user->phone=$phone;
            $user->city=$city;
            $user->email=$email;
            $user->password=\Illuminate\Support\Facades\Hash::make($password);
            $user->save();

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
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect("/");
    }

}
