<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

		return response()->json([
			'status' => 'Success',
			'message' => "",
			'data' => [
                'token' => $user->createToken('API Token')->plainTextToken,
                'user' => auth()->user()
            ]
		], 200);

    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Credentials not match',
                'data' => []
            ], 401);
        }

        return response()->json([
			'status' => 'Success',
			'message' => "",
			'data' => [
                'token' => auth()->user()->createToken('API Token')->plainTextToken,
                'user' => auth()->user()
            ]
		], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
			'status' => 'Success',
			'message' => 'Tokens Revoked',
			'data' => []
		], 200);
    }
}
