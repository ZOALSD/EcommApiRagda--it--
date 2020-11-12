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
       return $user->createToken($request->device_name);//->plainTextToken;

    }

    public function login(Request $request){

        $user = User::get();
        $user->tokens()->where('id', 3)->delete();


        Auth::user()->currentAccessToken()->delete();    

        return "oky";
    $data = ["user is :" => Auth::user()];
        return response()->json($data, 200);


        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        return $user->createToken($request->device_name)->plainTextToken;
    

    }

}