<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('login.LoginView');
    }

    public function autenticar(Request $recuest)
    {
        $user = User::where('email', $recuest->email)->first();
        if ($user && $user->password === $recuest->password) {
            return redirect('/Home/' . $recuest->email);
        }
        return redirect('/')->with('error', 'Credenciales incorrectas.');
    }
}
