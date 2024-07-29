<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:role,id',
        ]);

        // Creates a new user in the users table with the provided data, hashing the password before storing it. 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        // Creates creates a new token instance for the user. 
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
{

    // Validate the request 
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Search for a user in the database whose email address matches the one provided in the request.
    $user = User::where('email', $request->email)->first();

    // Check if the user was found and if the provided password matches the stored password.
    if (! $user || ! Hash::check($request->password, $user->password)) {
        // If not, throw a validation exception with an error message.
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    // Create an authentication token for the user.
    // 'authToken' - name of the token.
    // 'plainTextToken' is the generated token in plain text.
    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json(['token' => $token], 200);
}

    public function logout(Request $request)
    {

        // Deletes the user's current access token, logging them out.
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    // Directly checks the sessions table to ensure that the token is valid
    public function getUserInfo(Request $request)
    {
        $token = $request->bearerToken();

        // Checking if the token is in Sessions table
        $session = Session::where('token', $token)->first();

        if (!$session) {
            return response()->json(['error' => 'Token inválido'], 401);
        }

        // Return user info
        $user = User::find($session->user_id);

        return response()->json($user);
    }
}