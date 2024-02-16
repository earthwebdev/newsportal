<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function landingPage(){
        return view("front-view");
    }

    public function articleView($slug){
        $article = Article::where("slug",$slug)->firstOrFail();
        $article->views += 1;
        $article->save();
        return view("article-page",compact("article"));
    }

}
