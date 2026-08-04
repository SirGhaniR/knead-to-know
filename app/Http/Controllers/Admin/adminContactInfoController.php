<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;

#[Middleware('auth')]
class adminContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfo = ContactInfo::latest()->first();

        return view('admins.contact-info.index', compact('contactInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "phone" => "required|string",
            "address" => "required|string",
        ]);

        ContactInfo::create($validated);

        return redirect()->route("admin.contact-info.index")->with('success', "Contact's info updated successfully!");
    }
}
