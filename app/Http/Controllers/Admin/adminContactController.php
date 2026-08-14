<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('admins.contact.index', compact("contacts"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "is_read" => "required|boolean",
        ]);

        $contact = Contact::findOrFail($id);

        $contact->is_read = $validated["is_read"];
        $contact->save();

        return redirect()->route("admin.contact.index")->with('success', 'Contact marked as read!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->route("admin.contact.index")->with('success', 'Contact deleted successfully!');
    }
}
