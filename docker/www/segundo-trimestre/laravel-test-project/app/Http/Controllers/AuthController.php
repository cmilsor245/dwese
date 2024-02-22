<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response() -> json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return ['message' => 'Sesión cerrada correctamente'];
    }

    public function login(Request $request) { // hacer un login request para validar un usuario y tal personalizados
        $user = User::where('email', $request->email)->firstOrFail();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response() -> json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response() -> json(['message' => 'Hola ' . $user->name, 'access_token' => $token, 'token_type' => 'Bearer']);
    }
}
