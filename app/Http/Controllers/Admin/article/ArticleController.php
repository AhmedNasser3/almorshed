<?php

namespace App\Http\Controllers\admin\article;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\article\Article;

class ArticleController extends Controller
{
    public function view($articleId){
        $article = Article::findOrFail($articleId);
        $articles = Article::all();
        return view('frontend.pages.frontend.article.view',data: compact('article','articles'));
    }
    public function index(){
        $articles = Article::all();
        return view('admin.pages.article.index',compact('articles'));
    }
    public function create(){
        return view('admin.pages.article.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string',
            'subtitle' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/mkv|max:10240',
            'video_link' => 'nullable|url',
            'files.*' => 'nullable|file|max:5120',
            'author' => 'string',
            'status' => 'in:draft,published,archived',
            'alt' => 'nullable|string',
        ]);

        $slug = Str::slug($validated['title']);

        $imagePath = null;
        $videoPath = null;
        $filesPaths = [];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public');
        }
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos/articles', 'public');
        }
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filesPaths[] = $file->store('files/articles', 'public');
            }
        }

        $article = Article::create([
            'slug' => $slug,
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'image' => $imagePath,
            'video' => $videoPath,
            'video_link' => $validated['video_link'] ?? null,
            'files' => json_encode($filesPaths),
            'author' => $validated['author'],
            'status' => $validated['status'],
            'alt' => $validated['alt'] ?? null,
        ]);

        return redirect()->route('articles.index');
    }

    public function edit($articleId){
        $article = Article::findOrFail($articleId);
        return view('admin.pages.article.edit', compact('article'));
    }
    public function update($articleId){}
    public function delete($articleId){
        $article = Article::findOrFail($articleId);
        $article->delete();
        return redirect()->back();
    }
}