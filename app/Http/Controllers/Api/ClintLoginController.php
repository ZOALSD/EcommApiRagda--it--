<?php

namespace App\Http\Controllers\Api;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class ClintLoginController extends Controller
{
    
    public function Register(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'nullable|email|unique:users',
            'password' => 'nullable',
            'phone' => 'required|unique:users|numeric',
            'year' => 'required|numeric',
            'type' => 'required|numeric',
            'device_name' =>'required',
        ]);

        $data['password'] = Hash::make($request->password);
       $user = User::create($data);
       return $token = $user->createToken($request->device_name)->plainTextToken;

    }

    public function login(Request $request){

        $request->validate([
            'password' => 'required',
            'phone' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('phone', $request->phone)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'phone' => ['The provided phone number are incorrect.'],
            ]);
        }
    
        return $token = $user->createToken($request->device_name)->plainTextToken;
    

    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        $data ="We will miss you, don't be late to me !!";
        return response()->json($data, 200);
    }

}