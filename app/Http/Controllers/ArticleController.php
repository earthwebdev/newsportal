<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$articles = Article::get()->sortByDesc("id");
        $articles = Article::orderBy("id","desc")->paginate(2);
        return view("article.index", [
            "articles"=> $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get()->sortByDesc("id");
        return view('article.create',['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug'  =>'nullable|unique:articles,slug',
            'content'   => 'required',
            'image' => 'nullable|file|image|between:2,2048',
            'status'    => 'required',
            'category_id'   => 'required',
        ],[
            'title.required'    => 'Please enter the title',
            'status.required'   => 'Pleases enter the status',
            'category_id.required'  => 'Please choose the category',
            'content.required'  => 'Please enter the content',
        ]);

        //dd($request->all());
        if($request->slug == NULL || $request->slug == ""){
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug($request->slug);
        }

        $filename = time(). '-' . $slug. '.'. $request->image->extension();
        $request->image->storeAs('/public/images/articles/', $filename);

        Article::create([
            'title'=> $request->title,
            'slug'  => $slug,
            'content'   => $request->content,
            'image' => $filename,
            'category_id'   => $request->category_id,
            'status'=> $request->status
        ]);

        return redirect()->route('article.index')->with('success','Article added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if(!$article){
            return redirect()->route('article.index')->with('error','Article not found.');
        }
        $categories = Category::get()->sortByDesc("id");
        return view('article.edit', ['article' => $article,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'slug'  =>'nullable|unique:articles,slug',
            'content'   => 'required',
            'image' => 'nullable|file|image|between:2,2048',
            'status'    => 'required',
            'category_id'   => 'required',
        ],[
            'title.required'    => 'Please enter the title',
            'status.required'   => 'Pleases enter the status',
            'category_id.required'  => 'Please choose the category',
            'content.required'  => 'Please enter the content',
        ]);

        //dd($request->all());
        if($request->slug == NULL || $request->slug == ""){
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug($request->slug);
        }

        $filename = $article->image;
        if($request->image){
            $filename = time(). '-' . $slug. '.'. $request->image->extension();
            $request->image->storeAs('/public/images/articles/', $filename);

            if($article->image && Storage::exists('/public/images/articles/'.$article->image)){
                Storage::delete('/public/images/articles/'.$article->image);
            }
        }
        $article->update([
            'title'=> $request->title,
            'slug'  => $slug,
            'content'   => $request->content,
            'image' => $filename,
            'category_id'   => $request->category_id,
            'status'=> $request->status
        ]);

        return redirect()->route('article.index')->with('success','Article added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if(!$article){
            return redirect()->route('article.index')->with('error','Article not found.');
        }

        if($article->image && Storage::exists('/public/images/articles/'.$article->image)){
            Storage::delete('/public/images/articles/'.$article->image);
        }
        $article->delete();

        return redirect()->route('article.index')->with('success','Article deleted successfully.');
    }
}
