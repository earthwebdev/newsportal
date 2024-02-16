<div class="container">
    <div class="row">
        <div class="col-3">
            @if ($article->image != null)
                    <img class="w-100" src="{{ asset('storage/images/articles/'.$article->image) }}"  alt="{{ $article->title }}" />
                    @endif
        </div>
        <div class="col-9">
            <div>
                <span class="bg-primary text-white p-1 fs-6">{{ $article->category->title }}</span>
            </div>

            <div class="mt-2">
                <h2 class="fw-bolder" >
                    <a class="link-dark text-decoration-none" href="{{ route('article-page', $article->slug) }}" title="{{ $article->title }}">{{ $article->title }}</a>

                </h2>
            </div>

            <div class="d-flex justify-content-start gap-2">
                <div>{{ $article->created_at->isoFormat("MMMM D, YYYY") }}</div>
                <div>|</div>
                <div>{{ $article->views }} Views</div>

            </div>

        </div>
    </div>
</div>
