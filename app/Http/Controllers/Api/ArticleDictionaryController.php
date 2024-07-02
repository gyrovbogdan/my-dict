<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreArticleDictionaryRequest;
use App\Http\Requests\UpdateArticleDictionaryRequest;
use App\Models\Article;
use App\Models\ArticleDictionary;
use App\Services\DictionaryService;
use Illuminate\Routing\Controller;

class ArticleDictionaryController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'admin'])->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Article $article)
    {
        return DictionaryService::get($article);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleDictionaryRequest $request, Article $article)
    {
        return DictionaryService::store($request, $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleDictionaryRequest $request, ArticleDictionary $dictionary)
    {
        return DictionaryService::update($request, $dictionary);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleDictionary $dictionary)
    {
        return DictionaryService::delete($dictionary);
    }
}
