<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ClintLoginController extends Controller
{

    public function Register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'nullable',
            'phone' => 'required|unique:users|numeric',
            'year' => 'required|numeric',
            'type' => 'required|numeric',
            'device_name' => 'required',
        ]);

        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $token = $user->createToken($request->device_name)->plainTextToken;

        $dataa = User::where('id', $user->id)->first();

        return response()->json(['token' => $token, 'Data' => $dataa], 200);

    }

    public function UserUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'name' => 'nullable|string|min:3',
            'email' => 'nullable|email|', //unique:users',
            'password' => 'nullable',
            'phone' => 'required|unique:users|numeric',
            'year' => 'required|numeric',
        ]);

        // $data['password'] = Hash::make($request->password);
        // $user = User::create($data);

        if ($request->old_password) {
            $user = User::where('id', $id)->first();
            $check = Hash::check($request->old_password, $user->password);
            if ($check) {

                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->year = $request->year;
                $user->password = Hash::make($request->new_password);
                $user->save();

                return response(['stuts' => 'Success Data Updated', 'Data' => $user]);

            } else {
                return response('old Password incorrect');
            }

        } else {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->year = $request->year;
            $user->save();

            return response(['stuts' => 'Success Data Updated', 'Data' => $user]);

        }

        return response()->json(['stutus' => 'Successfully Data Updated'], 200);

    }

    public function data()
    {

        return response()->json(['Data' => User::where('id', 1)->get()]);

    }
    public function UserData()
    {
        return Auth::user();
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'phone' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();
        if ($user->type == 1) {
            $user_id = User::where('phone', $request->phone)->value('id');

            $token = Token::where('tokenable_id', $user_id)->count();
            if ($token != 0) {
                $user->tokens()->delete();
            }

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'phone' => ['The provided phone number are incorrect.'],
                ]);
            }

            $token = $user->createToken($request->device_name)->plainTextToken;
            return response()->json(['token' => $token, 'Data' => $user], 200);
        } else {
            return response()->json(['Stutus' => false, 'Message' => 'This App Only For Clint'], 200);

        }

    }

    public function login_seller(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'phone' => 'required',
            'device_name' => 'required',
        ]);
        $user = User::where('phone', $request->phone)->first();
        if ($user->type == 2) {
            $user_id = User::where('phone', $request->phone)->value('id');
            $token = Token::where('tokenable_id', $user_id)->count();
            if ($token != 0) {
                $user->tokens()->delete();
            }
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'phone' => ['The provided phone number are incorrect.'],
                ]);
            }
            $token = $user->createToken($request->device_name)->plainTextToken;
            return response()->json(['token' => $token, 'Data' => $user], 200);
        } else {
            return response()->json(['Stutus' => false, 'Message' => 'This App Only For Seller'], 200);

        }

    }

    public function login_deliver(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'phone' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();
        if ($user->type == 3) {
            $user_id = User::where('phone', $request->phone)->value('id');

            $token = Token::where('tokenable_id', $user_id)->count();
            if ($token != 0) {
                $user->tokens()->delete();
            }

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'phone' => ['The provided phone number are incorrect.'],
                ]);
            }

            $token = $user->createToken($request->device_name)->plainTextToken;
            return response()->json(['token' => $token, 'Data' => $user], 200);
        } else {
            return response()->json(['Stutus' => false, 'Message' => 'This App Only For Delivery'], 200);

        }

    }

    public function logout()
    {

        Auth::user()->currentAccessToken()->delete();
        $data = "We will miss you, don't be late to me !!";
        return response()->json($data, 200);
    }

}
