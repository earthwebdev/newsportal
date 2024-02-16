<x-front-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div>
                    <img class="w-100" src="{{ asset('storage/images/articles/'.$article->image) }}" alt="{{ $article->title }}" />
                </div>
                <div class="text-center mt-4">
                    <span class="bg-primary p-2 text-white">{{ $article->category->title }}</span>
                    <h1 class="display-5 mt-2">{{ $article->title }}</h1>
                </div>

                <div class="d-flex justify-content-start gap-2 fs-5" style="color: #555555">
                    <div>{{ $article->created_at->isoFormat("MMMM D, YYYY") }}</div>
                    <div>|</div>
                    <div>{{ $article->views }} Views</div>
                </div>
                <div class="mt-4 " style="text-align:justify">
                    {!! $article->content !!}
                </div>
            </div>
            <div class="col-4">
                <x-base.front.recent-news :count="10" />
            </div>
        </div>
    </div>


</x-front-layout>
