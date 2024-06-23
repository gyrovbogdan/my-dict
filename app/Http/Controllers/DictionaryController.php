<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDictionaryRequest;
use App\Http\Requests\UpdateDictionaryRequest;
use App\Models\Dictionary;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        return Dictionary::where('user_id', $user_id)->paginate(10);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dictionary $dictionary)
    {
        //
    }
}
