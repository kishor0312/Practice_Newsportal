<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where("status", true)->orderBy("position", "asc")->get();
        View::share([
            "categories" => $categories,
        ]);
    }
    public function home()
    {
        $latest = Article::where("status", true)->latest()->first();
        $mostViews = Article::where("status", true)->orderBy("views", "desc")->take(5)->get();
        return view('frontend.home', compact('latest', 'mostViews'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->where("status", true)->first();
        if (!$category) {
            abort(404);
        }
        return view('frontend.category', compact('category'));
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->where("status", true)->first();
        if (!$article) {
            abort(404);
        }
        return view('frontend.article', compact('article'));
    }
}
