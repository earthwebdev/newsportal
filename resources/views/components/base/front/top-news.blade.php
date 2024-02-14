<div>
    <div class="w-100 mb-2">
    @if ($article->image)
                    <img class="w-100" src="{{ asset('storage/images/articles/'.$article->image) }}"  alt="{{ $article->title }}" />
                    @endif
    </div>
    <div><span class="bg-primary text-white p-1">{{ $article->category->title }}</span></div>

    <div class="mt-2">
        <h2 class="fw-bolder display-6" style="text-align:justify">
            {{ $article->title}}

        </h2>
    </div>

    <div class="d-flex justify-content-start gap-2">
        <div>{{ $article->created_at->isoFormat("MMMM D, YYYY") }}</div>
        <div>|</div>
        <div>{{ $article->views }} Views</div>

    </div>
</div>
