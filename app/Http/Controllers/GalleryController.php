<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'min:5'
        ];
        $this->validate($request, $rules);

        $gallery = new Gallery();
        $gallery->user_id = auth()->user()->id;
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->save();

        $notification = 'La galería se ha registrado correctamente.';
        return redirect('/home')->with(compact('notification')); // $notification session('notification')
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.show')->with(compact('gallery'));
    }
}
