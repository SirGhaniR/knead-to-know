<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use App\Http\Controllers\Controller;

#[Middleware('auth')]
class adminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('admins.gallery.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048",
            "title" => "required",
        ]);

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploaded_images/'), $filename);
        $validated['image'] = $filename;

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::find($id);

        return view('admins.gallery.edit', compact("gallery"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048",
            "title" => "required",
        ]);

        $gallery = Gallery::find($id);

        $oldImage = $gallery->image;

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploaded_images/'), $filename);
        $validated['image'] = $filename;

        $gallery->image = $validated['image'];
        $gallery->title = $validated['title'];
        $gallery->save();

        if ($oldImage && $oldImage === $filename) {
            $oldImagePath = public_path('uploaded_images/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);

        $oldImage = $gallery->image;

        $gallery->delete();

        if ($oldImage) {
            $oldImagePath = public_path('uploaded_images/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        return redirect()->route('admin.gallery.index');
    }
}
