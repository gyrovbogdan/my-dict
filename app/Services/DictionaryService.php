<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;
use Stichoza\GoogleTranslate\GoogleTranslate;


class DictionaryService
{
    public static $rules = [
        'text' => 'required|string|min:1|max:20',
        'lang' => 'required|string|in:ru,en'
    ];

    public static function get($owner)
    {
        $dictionary = $owner->dictionary()->orderByDesc('id')->paginate(10)->onEachSide(0);
        return PaginationService::numberInstances($dictionary);
    }

    public static function store(FormRequest $request, $owner)
    {
        extract($request->only(['text', 'lang']));
        $translationPair = static::getTranslationPair($text, $lang);
        return $owner->dictionary()->create($translationPair);
    }

    public static function update(FormRequest $request, $dictionary)
    {
        extract($request->only(['text', 'lang']));
        $translationPair = static::getTranslationPair($text, $lang);
        return $dictionary->update($translationPair);
    }

    public static function delete($dictionary)
    {
        return $dictionary->delete();
    }

    public static function getTranslationPair(string $text, string $lang)
    {
        $word = '';
        $translation = '';

        if ($lang == 'ru') {
            $word = $text;
            $translation = GoogleTranslate::trans($text, 'en', $lang);
        } else {
            $translation = $text;
            $word = GoogleTranslate::trans($text, 'ru', $lang);

        }

        return compact('word', 'translation');
    }
}