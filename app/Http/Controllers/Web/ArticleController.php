<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = ArticleService::get();
        return view('pages.article.index', compact('articles'));
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
        $article = ArticleService::store($request);
        return to_route('article.show', ['article' => $article->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('pages.article.show', compact('article'));
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
        $article = ArticleService::update($request, $article);
        return to_route('article.show', ['article' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        ArticleService::delete($article);
        return to_route('article.index');

    }
}
