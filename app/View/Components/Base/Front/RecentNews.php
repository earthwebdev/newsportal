<?php

namespace App\View\Components\Base\Front;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentNews extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->articles = Article::latest()->limit(5)->get();
        //dd($this->articles);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.front.recent-news');
    }
}
