<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\WithoutMiddleware;

#[WithoutMiddleware('auth')]
class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfo = ContactInfo::latest()->first();

        return view('contact', compact("contactInfo"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "subject" => "required|string",
            "message" => "required|string",
        ]);

        Contact::create($validated);

        return redirect()->route("contact.index")->with('success', 'Contact created successfully!');
    }
}
