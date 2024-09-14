<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke($email)
    {
        $user = User::where('email', $email)->first();

        $publications = Publication::where('user_email', $email)
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home.HomeView', ['user' => $user, 'publications' => $publications]);
    }
}
