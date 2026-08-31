<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(16);
        $featuredNews = News::where('is_featured', true)->latest()->first();

        if (! $featuredNews && $news) {
            $featuredNews = $news->first();
        }

        return view('news', compact('news', 'featuredNews'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);

        return view('news-detail', compact('news'));
    }
}
