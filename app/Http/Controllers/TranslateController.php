<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Http\Requests\TranslateRequest;

class TranslateController extends Controller
{
    public function index(TranslateRequest $request)
    {
        extract($request->only(['text', 'target', 'source']));
        return [GoogleTranslate::trans($text, $target, $source)];
    }
}
