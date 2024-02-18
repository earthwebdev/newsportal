<div class="container">
    @foreach ($articles as $article)
    <x-base.front.article-with-description :article="$article" />
    @endforeach

</div>
