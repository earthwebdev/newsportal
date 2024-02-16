<div class="container">
    @foreach ($articles as $article)
    <x-base.front.article-with-description :id="$article->id" />
    @endforeach

</div>
