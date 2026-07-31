<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        $featuredNews = News::where('is_featured', true)->latest()->first();
        $galleries = Gallery::all();

        if (!$featuredNews && $news) {
            $featuredNews = $news->first();
        }

        return view('home', compact('news', 'featuredNews', 'galleries'));
    }
}
