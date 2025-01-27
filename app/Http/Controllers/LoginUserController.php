<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginUserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // create token for user
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json(['message'=>'Loggend in!!!!','token' => $token]);
            // return view('myaccount');
            
        } else {
            return response()->json('wrong eimail or passwrod', 401);
            
        } 
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out!!!!', 
                                        'message2' => 'Token deleted']);
    }
}
