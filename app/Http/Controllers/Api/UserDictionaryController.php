<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DestroyUserDictionaryRequest;
use App\Http\Requests\StoreUserDictionaryRequest;
use App\Http\Requests\UpdateUserDictionaryRequest;
use App\Models\Article;
use App\Models\UserDictionary;
use App\Services\DictionaryService;
use App\Http\Controllers\Controller;

class UserDictionaryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index');
        $this->middleware(['optional.auth.sanctum'])->only('index');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->check())
            return DictionaryService::get(Article::first());

        return DictionaryService::get(auth()->user());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDictionaryRequest $request)
    {
        return DictionaryService::store($request, auth()->user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserDictionaryRequest $request, UserDictionary $dictionary)
    {
        return DictionaryService::update($request, $dictionary);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyUserDictionaryRequest $request, UserDictionary $dictionary)
    {
        return DictionaryService::delete($dictionary);
    }
}
