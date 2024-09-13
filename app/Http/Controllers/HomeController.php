<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke($user)
    {
        return $user;
        return view('home.HomeView');
    }
}
