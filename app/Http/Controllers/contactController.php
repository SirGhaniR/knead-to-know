<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Routing\Attributes\Controllers\WithoutMiddleware;

#[Middleware('auth')]
class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('contact', compact("contacts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    #[WithoutMiddleware('auth')]
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required",
        ]);

        Contact::create($validated);

        return redirect()->route("contact.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);

        return view('contact', compact("contact"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "is_read" => "required",
        ]);

        $contact = Contact::find($id);

        $contact->is_read = $validated["is_read"];
        $contact->save();

        return redirect()->route("contact.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route("contact.index");
    }
}
