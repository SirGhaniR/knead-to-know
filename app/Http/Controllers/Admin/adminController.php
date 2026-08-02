<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Routing\Attributes\Controllers\Middleware;

#[Middleware('auth')]
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::count();
        $galleries = Gallery::count();
        $contacts = Contact::count();
        $unreadContacts = Contact::where('is_read', false)->count();

        $recentNews = News::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $featuredNews = News::where('is_featured', true)->latest()->take(3)->get();

        return view('admins.dashboard', compact(
            'news',
            'galleries',
            'contacts',
            'unreadContacts',
            'recentNews',
            'recentContacts',
            'featuredNews'
        ));
    }
}
