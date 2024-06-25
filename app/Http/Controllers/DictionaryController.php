<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDictionaryRequest;
use App\Http\Requests\UpdateDictionaryRequest;
use App\Models\Dictionary;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $dictionaries = Dictionary::where('user_id', $user_id)->orderByDesc('id')->paginate(10);

        $count = Dictionary::where('user_id', $user_id)->count();
        $perPage = $dictionaries->perPage();
        $currentPage = $dictionaries->currentPage();
        $startIndex = ($count / $perPage - $currentPage + 1) * $perPage;

        $dictionaries->getCollection()->transform(function ($item, $index) use ($startIndex) {
            $item->number = $startIndex - $index;
            return $item;
        });

        return $dictionaries;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDictionaryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dictionary $dictionary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDictionaryRequest $request, Dictionary $dictionary)
    {
        $tr = new GoogleTranslate();
        extract($request->only(['text', 'lang']));
        if ($lang == 'ru') {
            $word = $text;
            $translation = $tr->setSource($lang)->setTarget('en')->translate($text);
            $dictionary->update(['word' => $text, 'translation' => $translation]);
        } else {
            $translation = $text;
            $word = $tr->setSource($lang)->setTarget('ru')->translate($text);
            $dictionary->update(['word' => $word, 'translation' => $translation]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dictionary $dictionary)
    {
        //
    }
}
