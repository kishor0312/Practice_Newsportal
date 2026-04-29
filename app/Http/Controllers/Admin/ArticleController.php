<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy("id", "desc")->get();
        return view("admin.article.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  Category::all();
        return view("admin.article.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "description" => "required",
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->author = $request->author;
        $article->slug = Str::slug($request->title);
        $article->description = $request->description;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;

        $file = $request->image;
        if ($file) {
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move("images", $filename);
            $article->image = "images/" . $filename;
        }

        $article->save();
        $article->categories()->attach($request->categories);
        toast("Article created successfully", "success");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories =  Category::all();
        return view("admin.article.edit", compact("article", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "description" => "required",
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->author = $request->author;
        $article->slug = Str::slug($request->title);
        $article->status = $request->status;
        $article->description = $request->description;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;

        $file = $request->image;
        if ($file) {
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move("images", $filename);
            $article->image = "images/" . $filename;
        }

        $article->save();
        $article->categories()->sync($request->categories);
        toast("Article updated successfully", "success");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        toast("Article deleted successfully", "success");
        return redirect()->back();
    }
}
