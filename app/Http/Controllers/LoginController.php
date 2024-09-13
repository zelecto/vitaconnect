<?php

namespace App\Http\Controllers;

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
            'password' => 'required|string',
        ]);


        $user = User::where('email', $request->email)->first();


        if ($user && Hash::check($request->password, $user->password)) {

            session(['user_id' => $user->id]);

            return redirect('/Home/' . urlencode($user->email));
        }

        return redirect('/')->with('error', 'Credenciales incorrectas.');
    }
}
