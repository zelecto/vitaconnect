<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $comment = new Comment();
        $comment->text = $request->comentario;
        $comment->user_email  = $request->user_email;
        $comment->publication_id  = $request->publication_id;
        $comment->save();

        return redirect()->back()->with('success', 'comentario procesado correctamente');
    }
}
