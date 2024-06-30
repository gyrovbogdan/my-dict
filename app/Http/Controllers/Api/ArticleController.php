<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Services\PaginationService;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $dictionary = $article->dictionary()->orderByDesc('id')->paginate(10);
        return PaginationService::addNumbers($dictionary);
    }
}
