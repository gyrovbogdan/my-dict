<?php


namespace App\Services;

use App\Http\Requests\UpdateDictionaryRequest;
use App\Models\Dictionary;
use App\Models\User;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Http\Requests\StoreDictionaryRequest;


class DictionaryService
{

    public static function get()
    {
        $dictionary = auth()->user()->dictionary()->orderByDesc('id')->paginate(10);
        return PaginationService::addNumbers($dictionary);
    }

    public static function store(StoreDictionaryRequest $request)
    {
        extract($request->only(['text', 'lang']));
        $translationPair = DictionaryService::getTranslationPair($text, $lang);
        return auth()->user()->dictionary()->create($translationPair);
    }

    public static function update(UpdateDictionaryRequest $request, Dictionary $dictionary)
    {
        extract($request->only(['text', 'lang']));
        $translationPair = DictionaryService::getTranslationPair($text, $lang);
        return $dictionary->update($translationPair);
    }

    public static function delete(Dictionary $dictionary)
    {
        return $dictionary->delete();
    }

    private static function getTranslationPair(string $text, string $lang)
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