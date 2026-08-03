<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $featuredNews = News::where('is_featured', true)->latest()->first();

        $news = News::where('is_featured', false)
            ->latest()
            ->take(4)
            ->get();

        if (!$featuredNews && $news) {
            $featuredNews = $news->first();
        }

        $galleries = Gallery::latest()->take(9)->get();

        return view('home', compact('news', 'featuredNews', 'galleries'));
    }
}
