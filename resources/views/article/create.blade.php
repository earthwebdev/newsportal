<x-back-layout>
    <h1>Create Article</h1>
    <form action="{{ route('article.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
          <label for="title" class="form-label">Title</label>
          <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}">
          @error('title')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="col-md-12">
          <label for="slug" class="form-label">Slug</label>
          <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug') }}">
          @error('slug')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="col-12">
          <label for="content" class="form-label">Content</label>
          <textarea name="content" class="form-control" id="content">{{ old('content') }}</textarea>
          @error('content')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="" selected>Choose...</option>
                @if($categories)
                    @foreach ($categories as $category)
                    <option {{ old('category_id') == $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
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
            <option {{ old('status') == 'active'?'selected':'' }} value="active">Active</option>
            <option {{ old('status') == 'inactive'?'selected':'' }} value="inactive">Inactive</option>
          </select>
          @error('status')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      @section('scripts')
      <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_SECRET_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
        tinymce.init({
          selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
          plugins: 'code table lists',
          toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
      </script>
      @endsection
</x-back-layout>
