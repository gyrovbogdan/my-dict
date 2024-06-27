<?php


namespace App\Services;

use App\Http\Requests\UpdateDictionaryRequest;
use App\Models\Dictionary;
use App\Models\User;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Http\Requests\StoreDictionaryRequest;


class DictionaryService
{
    public static function getDictionary()
    {
        $user_id = auth()->id();
        $dictionaries = Dictionary::where('user_id', $user_id)->orderByDesc('id')->paginate(10);

        $total = $dictionaries->total();
        $perPage = $dictionaries->perPage();
        $currentPage = $dictionaries->currentPage();
        $startIndex = round((($total / $perPage) - $currentPage + 1) * $perPage);

        $dictionaries->getCollection()->transform(function ($item, $index) use ($startIndex) {
            $item->number = $startIndex - $index;
            return $item;
        });

        return $dictionaries;
    }

    public static function storeDictionary(StoreDictionaryRequest $request)
    {
        extract($request->only(['text', 'lang']));
        $translationPair = DictionaryService::getTranslationPair($text, $lang);

        $user = auth()->user()->get();
        debugbar()->info($user);
        $dictionary = $user->dictionary()->create($translationPair);

        return $dictionary;
    }

    public static function updateDictionary(UpdateDictionaryRequest $request, Dictionary $dictionary)
    {
        extract($request->only(['text', 'lang']));
        $translationPair = DictionaryService::getTranslationPair($text, $lang);

        return $dictionary->update($translationPair);
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