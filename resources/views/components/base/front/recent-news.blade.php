<div>
    <div>
        <h2 class="fw-bold">Recent news</h2>
    </div>
    <div>
        @foreach ($news as $new_item)
            <x-base.front.article-without-description :article="$new_item" />
        @endforeach

    </div>
</div>
