<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request data...
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication successful, generate a token for the user
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('AuthToken')->plainTextToken;

            // Return the token to the client
            return response()->json(['token' => $token], 200);
        }   

        // Authentication failed, return an error response
        return response()->json(['error' => 'Unauthorized'], 401);
    }
  
}
