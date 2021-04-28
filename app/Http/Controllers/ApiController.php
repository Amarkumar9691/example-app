<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\Models\User;

class ApiController extends Controller
{
    
    public function register(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validator->fails())
        {
        	return response(['message'=> $validator->messages()]);
        }
        else
        {
        	 $user = User::create([
                  
                   'name' => $request->name,
                   'email' => $request->email,
                   'password' => Hash::make($request->password),

        	 ]);

        	 $token = $user->createToken('authToken')->accessToken;

        	 return response(['user'=>$user,'token'=>$token]);
        }

      
          
    }

    public function login(Request $request)
    {

    	  $request->validate([
                      'email' =>    'required|string|email',
                      'password' => 'required|string',
                           ]);

    	  if(Auth::attempt($request->all()))
    	  {
             $token  = Auth::user()->createToken('authToken')->accessToken;
             return response(['user'=>Auth::user(),'token'=>$token]);
    	  }
    	  else
    	  {
    	  	return response(['message'=>'Invalid credentials']);
    	  }

    }
}
