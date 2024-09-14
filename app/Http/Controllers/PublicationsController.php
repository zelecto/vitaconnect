<?php

namespace App\Http\Controllers;

use App\Models\publication;
use App\Models\PublicationImage;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    public function create(Request $request)
    {

        // $validated = $request->validate([
        //     'description' => 'string|max:255',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'user_email' => 'required|email',
        // ]);

        // Crear nueva publicación
        $publication = new Publication();
        $publication->description = $request->description;
        $publication->user_email = $request->user_email;
        $publication->save();

        // Manejar las imágenes
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $path = $file->store('images', 'public');
                // Guardar el path en la base de datos si es necesario
                PublicationImage::create([
                    'publication_id' => $publication->id,
                    'image_path' => $path
                ]);
            }
        }
        return redirect('/Home/' . $request->user_email);
    }
}
