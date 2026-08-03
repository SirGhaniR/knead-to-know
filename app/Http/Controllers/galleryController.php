<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        $carousel = Gallery::latest()->take(8)->get();

        return view('gallery', compact('galleries', 'carousel'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::find($id);

        return view('gallery', compact("gallery"));
    }
}
