<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(20);
        return view('admins.news.index', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'is_featured' => 'nullable|boolean'
        ]);

        $validated['image'] = $this->uploadImage($request->file('image'));
        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('admins.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'is_featured' => 'nullable|boolean'
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->deleteImage($news->image);
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteImage($news->image);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully!');
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
