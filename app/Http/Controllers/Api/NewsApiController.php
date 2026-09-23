<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $news->items(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['image'] = $this->uploadImage($request->file('image'));
        $validated['is_featured'] = $request->boolean('is_featured');

        $news = News::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dibuat',
            'data' => $news,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($news->image);
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $news->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diupdate',
            'data' => $news->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteImage($news->image);
        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus',
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
