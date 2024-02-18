

<x-front-layout>
    <div class="container mt-4">
        <h1>
            {{ $category->title }}
        </h1>
        <h6>
            Total Articles: {{ $category->articles_count }}
        </h6>

        <div class="mt-4">

            @foreach ( $category->articles as $article)
                <x-base.front.article-with-description :article="$article" />
                @endforeach
        </div>
    </div>
</x-front-layout>
