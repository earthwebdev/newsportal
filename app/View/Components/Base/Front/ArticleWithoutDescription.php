<?php

namespace App\View\Components\Base\Front;

use Closure;
use App\Models\Article;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ArticleWithoutDescription extends Component
{
    public $article;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->article = Article::find(22);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.front.article-without-description');
    }
}
