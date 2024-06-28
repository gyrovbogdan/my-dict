<?php

namespace App\Http\Controllers\Api;

use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Http\Requests\TranslateRequest;
use App\Http\Controllers\Controller;

class TranslateController extends Controller
{
    public function index(TranslateRequest $request)
    {
        extract($request->only(['text', 'target', 'source']));
        return [GoogleTranslate::trans($text, $target, $source)];
    }
}
