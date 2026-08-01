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
        $galleries = Gallery::latest()->paginate(20);

        return view('admins.gallery.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg|max:4096",
            "title" => "required|string",
        ]);

        $validated['image'] = $this->uploadImage($request->file('image'));
        Gallery::create($validated);

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('admins.gallery.edit', compact("gallery"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "image" => "nullable|image|mimes:jpeg,png,jpg|max:4096",
            "title" => "required|string",
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->deleteImage($gallery->image);
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->deleteImage($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index');
    }


    private function uploadImage($image)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploaded_images/'), $filename);
        return $filename;
    }

    private function deleteImage($imagePath)
    {
        if (empty($imagePath)) {
            return;
        }

        $fullPath = public_path('uploaded_images/' . $imagePath);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
