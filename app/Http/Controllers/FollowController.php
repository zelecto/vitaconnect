<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow($user_email, $follow_email)
    {

        $user = User::where('email', $user_email)->first();
        $follow = User::where('email', $follow_email)->first();

        $existingFollow = Follow::where('follower_email', $user_email)
            ->where('followed_email', $follow_email)
            ->first();

        if ($existingFollow) {
            return response()->json(['message' => 'Ya sigues a este usuario'], 400);
        }

        Follow::create([
            'follower_email' => $user_email,
            'followed_email' => $follow_email,
        ]);

        return
            redirect()->back()->with('success', '¡Has comenzado a seguir a ' . $follow_email . '! 😃');
    }
}
