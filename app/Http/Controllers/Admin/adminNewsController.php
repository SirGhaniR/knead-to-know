<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use App\Http\Controllers\Controller;

#[Middleware('auth')]
class adminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->take(5)->paginate(20);

        return view('admins.news.index', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'is_featured' => 'nullable|boolean'
        ]);

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploaded_images/'), $filename);
        $validated['image'] = $filename;

        News::create($validated);

        return redirect()->route('admin.news.index');
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'is_featured' => 'nullable|boolean'
        ]);

        $news = News::find($id);

        $oldImage = $news->image;

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploaded_images/'), $filename);
        $validated['image'] = $filename;

        $news->title = $validated['title'];
        $news->content = $validated['content'];
        $news->image = $validated['image'];
        $news->is_featured = $validated['is_featured'];
        $news->save();

        if ($oldImage && $oldImage !== $filename) {
            $oldImagePath = public_path('uploaded_images/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);

        $oldImage = $news->image;

        $news->delete();

        if ($oldImage) {
            $oldImagePath = public_path('uploaded_images/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        return redirect()->route('admin.news.index');
    }
}
