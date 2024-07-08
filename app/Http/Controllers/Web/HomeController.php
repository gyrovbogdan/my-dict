<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $articles = ArticleService::get(3);
        return view('pages.home', compact('articles'));
    }
}
