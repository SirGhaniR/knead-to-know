<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Routing\Attributes\Controllers\WithoutMiddleware;

#[Middleware('auth')]
class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #[WithoutMiddleware('auth')]
    public function index()
    {
        $news = News::latest()->get();
        $featuredNews = News::where('is_featured', true)->latest()->first();

        if (!$featuredNews && $news) {
            $featuredNews = $news->first();
        }

        return view('news', compact('news', 'featuredNews'));
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
        ]);

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploaded_images/'), $filename);
        $validated['image'] = $filename;

        News::create($validated);

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    #[WithoutMiddleware('auth')]
    public function show(string $id)
    {
        $news = News::find($id);

        return view('news-detail', compact('news'));
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
        $news->save();

        if ($oldImage && $oldImage !== $filename) {
            $oldImagePath = public_path('uploaded_images/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        return redirect()->route('news.index');
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

        return redirect()->route('news.index');
    }
}
