<x-back-layout>
    <h1>Articles Edit</h1>
    <form action="{{ route('article.update', $article->id) }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="col-md-12">
          <label for="title" class="form-label">Title</label>
          <input name="title" type="text" class="form-control" id="title" value="{{ old('title')?old('title'): $article->title }}">
          @error('title')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="col-md-12">
          <label for="slug" class="form-label">Slug</label>
          <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug')?old('slug'): $article->slug }}">
          @error('slug')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="col-12">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content">{{ old('content')?old('content'):$article->content }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @if ($article->image)
                    <img height="100" src="{{ asset('storage/images/articles/'.$article->image) }}"  alt="{{ $article->title }}" />
                    @else
                    <span class="text-danger">No  images uploaded</span>
                    @endif
            @error('image')
                    <span class="text-danger">{{ $message }}</span>
              @endif
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="" selected>Choose...</option>
                @if($categories)
                    @foreach ($categories as $item)
                    <option {{ (old('category_id') == $item->id || $article->category_id == $item->id ?'selected':'') }} value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="form-group">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-select">
            <option value="" selected>Choose...</option>
            <option {{ (old('status') == 'active' || $article->status =='active'?'selected':'') }} value="active">Active</option>
            <option {{ old('status') == 'inactive' || $article->status =='inactive'?'selected':'' }} value="inactive">Inactive</option>
          </select>
          @error('status')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

</x-back-layout>
