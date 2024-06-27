<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDictionaryRequest;
use App\Http\Requests\UpdateDictionaryRequest;
use App\Models\Dictionary;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Sleep;
use App\Services\DictionaryService;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DictionaryService::getDictionary();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDictionaryRequest $request)
    {
        return DictionaryService::storeDictionary($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDictionaryRequest $request, Dictionary $dictionary)
    {
        return DictionaryService::updateDictionary($request, $dictionary);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dictionary $dictionary)
    {
        return $dictionary->delete();
    }
}
