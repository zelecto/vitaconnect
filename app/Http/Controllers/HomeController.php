<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke($emailUser)
    {
        $user = User::where('email', $emailUser)->first();
        return view('home.HomeView', ['user' => $user]);
    }
}
