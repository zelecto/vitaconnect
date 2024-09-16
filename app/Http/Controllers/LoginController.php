<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('login.LoginView');
    }

    public function autenticar(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.email' => 'Por favor, introduce un correo electrónico válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.string' => 'La contraseña debe ser una cadena de texto válida.',
        ]);



        $user = User::where('email', $request->email)->first();


        if ($user && Hash::check($request->password, $user->password)) {
            return redirect('/Home/' . $user->email);
        }

        return redirect('/')->with('error', 'Credenciales incorrectas.');
    }
}
