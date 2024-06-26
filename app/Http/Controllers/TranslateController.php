<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateController extends Controller
{
    public function index(Request $request)
    {
        $tr = new GoogleTranslate();
        extract($request->only(['source', 'target', 'text']));
        $result = $tr->setSource($source)->setTarget($target)->translate($text);
        // $result = "Перевод";
        return [$result];
    }
}
