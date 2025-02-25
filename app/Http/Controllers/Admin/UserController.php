<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userRegistration(Request $request){


        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);



        return redirect('/sign-in-page');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $userEmail=$request->email;
        $userPassword=$request->password;

        $user = User::where('email', $userEmail)->where('password', $userPassword)->first();
        if ($user) {
            $token = JWTToken::createToken($user->id,$user->email,$user->role);
            $request->session()->put('login',true);
            $request->session()->put('userName',$user->name);
            if($user->role=='admin'){
                $request->session()->put('user','admin');
                return redirect('/sign-in-page')->cookie('token', $token, 60 * 24);

            }else{
                $request->session()->put('user','customer');
                return redirect('/sign-in-page')->cookie('token', $token, 60 * 24);
            }

        } else {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }
    }

    public function readProfile(Request $request){
        $userId=$request->header('user_id');
        $userEmail=$request->header('user_email');
        $user = User::where('id', $userId)->where('email', $userEmail)->first();
        return $user;
    }
}
