<?php

namespace App\Http\Controllers;

use App\Models\News;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->get();
        $featuredNews = News::where('is_featured', true)->latest()->first();

        if (!$featuredNews && $news) {
            $featuredNews = $news->first();
        }

        return view('news', compact('news', 'featuredNews'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::find($id);

        return view('news-detail', compact('news'));
    }
}
