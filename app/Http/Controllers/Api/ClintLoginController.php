<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Support\Facades\Auth;
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
            $token = $user->createToken($request->device_name)->plainTextToken;
     
            return response()->json(['token' => $token , 'Data' => $user], 200);

    }


    public function UserUpdate(Request $request ,$id)
    {
        
         $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'nullable|email|unique:users',
            'password' => 'nullable',
            'phone' => 'required|unique:users|numeric',
            'year' => 'required|numeric',
        ]);

           // $data['password'] = Hash::make($request->password);

           // $user = User::create($data);

           if($request->old_password){
             $user = User::where('id',$id)->first();
             $check = Hash::check($request->old_password, $user->password);
             if($check){

                $user =User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->year = $request->year;
                $user->password = Hash::make($request->new_password);
                $user->save();

                return response(['stuts'=>'Success Data Updated' , 'Data' => $user]);

             }else{
                 return response('old Password incorrect');
             }

           }else{
            $user =User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->year = $request->year;
            $user->save();

            return response(['stuts'=>'Success Data Updated' , 'Data' => $user]);

           }

        
     
            return response()->json(['stutus' => 'Successfully Data Updated'], 200);

    }

    public function UserData(){
        return Auth::user();
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
    
       
         $token = $user->createToken($request->device_name)->plainTextToken;
         
        return response()->json(['token' => $token , 'Data' => $user], 200);


    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        $data ="We will miss you, don't be late to me !!";
        return response()->json($data, 200);
    }

}