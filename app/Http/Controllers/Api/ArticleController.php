<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        return Article::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $dictionary = $article->dictionary()->orderByDesc('id')->paginate(10);

        $total = $dictionary->total();
        $perPage = $dictionary->perPage();
        $currentPage = $dictionary->currentPage();
        $startIndex = round((($total / $perPage) - $currentPage + 1) * $perPage);

        $dictionary->getCollection()->transform(function ($item, $index) use ($startIndex) {
            $item->number = $startIndex - $index;
            return $item;
        });

        return $dictionary;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        return $article->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        return $article->delete();
    }
}