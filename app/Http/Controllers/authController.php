<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auth");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required|string|min:6",
        ]);

        if (!Auth::attempt($validated)) {
            return back();
        }

        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
