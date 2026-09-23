<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $galleries = Gallery::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $galleries->items(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $validated['image'] = $this->uploadImage($request->file('image'));
        $gallery = Gallery::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil dibuat',
            'data' => $gallery,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($gallery->image);
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        $gallery->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil diupdate',
            'data' => $gallery->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->deleteImage($gallery->image);
        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil dihapus',
        ]);
    }

    private function uploadImage($image)
    {
        $filename = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('uploaded_images/'), $filename);

        return $filename;
    }

    private function deleteImage($imagePath)
    {
        if (empty($imagePath)) {
            return;
        }

        $fullPath = public_path('uploaded_images/'.$imagePath);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
