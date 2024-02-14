<div>

    @if ($article->image)
                    <img height="w-100" src="{{ asset('storage/images/articles/'.$article->image) }}"  alt="{{ $article->title }}" />
                    @endif

                    <h1>{{ $article->title}}</h1>


    {{ $article->content }}
</div>
