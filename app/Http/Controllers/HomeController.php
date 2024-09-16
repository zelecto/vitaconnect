<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\suggest;

class HomeController extends Controller
{
    public function __invoke($email)
    {
        $user = User::where('email', $email)->first();

        $publications = Publication::with([
            'user:email,name,last_name,foto_perfil',
            'images',
            'comments.user:email,name,last_name,foto_perfil'
        ])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $topUsersByLikes = DB::table('reactions')
            ->join('publications', 'reactions.publication_id', '=', 'publications.id')
            ->join('users', 'reactions.user_email', '=', 'users.email')
            ->leftJoin('follows', function ($join) use ($email) {
                $join->on('users.email', '=', 'follows.followed_email')
                    ->where('follows.follower_email', '=', $email);
            })
            ->where('publications.user_email', '=', $email)
            ->where('reactions.user_email', '!=', $email)
            ->whereNull('follows.id')
            ->select('reactions.user_email', 'users.name', 'users.last_name', 'users.foto_perfil', DB::raw('COUNT(*) as like_count'))
            ->groupBy('reactions.user_email', 'users.name', 'users.last_name', 'users.foto_perfil')
            ->orderBy('like_count', 'desc')
            ->get();

        // Construir la consulta
        $stories = DB::table('stories as s')
            ->leftJoin('follows as f', 's.user_email', '=', 'f.followed_email')
            ->where(function ($query) use ($email) {
                $query->where('s.user_email', $email)
                    ->orWhere('f.follower_email', $email);
            })
            ->select('s.*')
            ->orderBy('s.created_at', 'desc')
            ->get();

        return view('home.HomeView', ['user' => $user, 'publications' => $publications, 'suggestions' => $topUsersByLikes, 'stories' => $stories]);
    }
}
