<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contacts = Contact::latest()->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $contacts->items(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'is_read' => 'required|boolean',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->is_read = $validated['is_read'];
        $contact->save();

        return response()->json([
            'success' => true,
            'message' => 'Contact berhasil diupdate',
            'data' => $contact,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact berhasil dihapus',
        ]);
    }
}
