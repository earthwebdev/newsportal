<x-back-layout>
    <h1>Create Category</h1>
    <form action="{{ route('category.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
          <label for="title" class="form-label">Title</label>
          <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}">
          @if ($error('title'))
            <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="col-md-12">
          <label for="slug" class="form-label">Slug</label>
          <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug') }}">
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @if ($error('image'))
            <span class="text-danger">{{ $message }}</span>
          @endif
          </div>
        <div class="col-md-4">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-select">
            <option selected>Choose...</option>
            <option {{ old('title') == 1?'selected':'' }} value="1">Active</option>
            <option {{ old('title') == 2?'selected':'' }} value="2">Inactive</option>
          </select>
          @if ($error('status'))
            <span class="text-danger">{{ $message }}</span>
          @endif
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
</x-back-layout>
