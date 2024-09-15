<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function store(Request $request)
    {
        $story = new Story();
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $path = $file->store('images', 'public');
            }
        }
        $story->image = $path;
        $story->user_email = $request->user_email;
        $story->save();
        return
            redirect()->back()->with('success', 'Se a creado la Historia');
    }
}
