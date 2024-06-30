<?php

namespace App\Services;

use Carbon\Carbon;

class ArticleService
{
    public static function addTimeAgo($articles)
    {
        return $articles->map(function ($item, $key) {
            $timeAgo = Carbon::parse($item['updated_at'])->diffForHumans();
            $item['caption'] = "Обновлено $timeAgo";
            return $item;
        });
    }
}