<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderByDesc('id')->paginate(10);
        $articles = ArticleService::transform($articles);
        $isAdmin = optional(auth()->user())->isAdmin();
        return view('pages.article.index', compact('articles', 'isAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'image' => 'required|image'
        ]);

        $validatedData['image'] = $request->file('image')->store('public');
        $article = Article::create($validatedData);

        return redirect()->action([ArticleController::class, 'show'], ['article' => $article->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $isAdmin = optional(auth()->user())->isAdmin();
        return view('pages.article.show', compact('article', 'isAdmin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('pages.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'string',
            'text' => 'string',
            'image' => 'image'
        ]);

        $validatedData['image'] = $request->file('image')->store('public');
        $article->update($validatedData);

        return redirect()->action([ArticleController::class, 'show'], ['article' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->action([ArticleController::class, 'index']);

    }
}
