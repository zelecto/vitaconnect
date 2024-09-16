<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Publication;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __invoke($user_email)
    {

        $user = User::where('email', $user_email)->first();

        $followingUsers = User::whereIn('email', function ($query) use ($user_email) {
            $query->select('followed_email')
                ->from('follows')
                ->where('follower_email', $user_email);
        })->get(['email', 'name', 'foto_perfil']);

        $followingEmails = $followingUsers->pluck('email');

        $followers = User::whereIn('email', function ($query) use ($user_email) {
            $query->select('follower_email')
                ->from('follows')
                ->where('followed_email', $user_email);
        })
            ->whereNotIn('email', $followingEmails)
            ->get(['email', 'name', 'foto_perfil']);

        $publications = Publication::where('user_email', $user_email)->get();
        $stories = Story::where('user_email', $user_email)->get();

        return view('perfil.profile_user_view', compact('user', 'followingUsers', 'followers', 'publications', 'stories'));
    }



    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|string'
        ];
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $user->foto_perfil = $imagePath;
        }
        $user->save();

        return redirect('/Home/' . $user->email);
    }
}
