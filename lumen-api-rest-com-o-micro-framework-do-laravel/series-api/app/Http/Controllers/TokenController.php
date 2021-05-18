<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Firebase\JWT\JWT;

use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email)->get()->first();

        if (is_null($usuario) 
            || !Hash::check($request->password, $usuario->password)) {
            return response()->json('Usuario/Senha invalidos', 401);
        }

        // payload do jwt = ['email' => $request->email]
        $token = JWT::encode(['email' => $request->email], env('JWT_KEY'));

        return [
            'access_token' => $token
        ];
    }
}