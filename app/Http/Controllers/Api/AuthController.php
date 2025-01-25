<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return response()->json([
                "status" =>false,
                "message" => $validator->errors(),
            ]);
        }



        $user =  User::create([
            'name' =>$request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            "status" =>true,
            "user" => $user,
            "token" => $token,
            "message" => "User Created Successfully",
        ]);


    }














    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "status" =>false,
                "message" => $validator->errors(),
            ]);
        }

        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){


            return response()->json([
                "status" =>false,
                "message" => "User Email or password is incorrect!",
            ]);


        }





        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            "status" =>true,
            "user" => $user,
            "token" => $token,
            "message" => "Logged In Successfully",
        ]);


    }




    public function try(){
        return response()->json([
            "status" =>true,
            "message" => "It's Working",
        ]);
    }








}
