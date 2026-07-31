<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\News;

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

        return view('admins.dashboard', compact('news', 'galleries', 'contacts', 'unreadContacts'));
    }
}
