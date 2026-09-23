<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfo = ContactInfo::latest()->first();

        return response()->json([
            'success' => true,
            'data' => $contactInfo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $contactInfo = ContactInfo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Contact info berhasil disimpan',
            'data' => $contactInfo,
        ], 201);
    }
}
