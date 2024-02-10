<x-back-layout>
    <h1>Create Category</h1>
    <form action="{{ route('category.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
          <label for="title" class="form-label">Title</label>
          <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}" />
          @error('title')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="col-md-12">
          <label for="slug" class="form-label">Slug</label>
          <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug') }}" />
          @error('slug')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
          @error('description')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control-file" id="image" />
            @error('image')
                <span class="text-danger">{{ $message }}</span>
          @endif
          </div>
        <div class="form-group">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-select">
            <option value="" selected>Choose...</option>
            <option {{ old('status') == 1?'selected':'' }} value="1">Active</option>
            <option {{ old('status') == 2?'selected':'' }} value="2">Inactive</option>
          </select>
          @error('status')
                <span class="text-danger">{{ $message }}</span>
          @endif
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
</x-back-layout>
