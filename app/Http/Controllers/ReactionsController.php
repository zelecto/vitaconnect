<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Reaction;
use Illuminate\Http\Request;

class ReactionsController extends Controller
{
    public function create(Request $request)
    {

        $reaction = Reaction::where('user_email', $request->user_email)
            ->where('publication_id', $request->id_publication)
            ->first();

        if ($reaction) {
            $reaction->reaction = !$reaction->reaction;
        } else {
            $reaction = new Reaction();
            $reaction->reaction = true;
            $reaction->user_email = $request->user_email;
            $reaction->publication_id = $request->id_publication;
        }
        // Guarda la reacción, ya sea actualizada o nueva
        $reaction->save();
        return redirect()->back()->with('success', 'Reacción procesada correctamente');
    }
}
