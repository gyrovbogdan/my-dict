<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
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