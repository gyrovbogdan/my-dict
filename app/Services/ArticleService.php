<?php

namespace App\Services;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public static function get()
    {
        $articles = Article::orderByDesc('id')->paginate(10);
        return ArticleService::transform($articles);
    }

    public static function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'string',
            'text' => 'string',
            'image' => 'image'
        ]);

        if ($request->exists('image'))
            $validatedData['image'] = $request->file('image')->store('public');
        $article->update($validatedData);

        return $article;
    }

    public static function delete(Article $article)
    {
        return $article->delete();
    }

    public static function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'image' => 'required|image'
        ]);

        $validatedData['image'] = $request->file('image')->store('public');
        return Article::create($validatedData);
    }

    public static function transform($articles)
    {
        $articles->transform(function ($item, $key) {
            ArticleService::addCaption($item);
            ArticleService::addImageUrl($item);
            return $item;
        });
        return $articles;
    }

    private static function addCaption(&$article)
    {
        $timeAgo = Carbon::parse($article['updated_at'])->diffForHumans();
        $article['caption'] = "Обновлено $timeAgo";
    }

    private static function addImageUrl(&$article)
    {
        $article['image'] = Storage::url($article['image']);
    }
}