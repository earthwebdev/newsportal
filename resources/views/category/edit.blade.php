<x-back-layout>
    <h1>Categories Edit</h1>
    <form action="{{ route('category.update', $category->id) }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="col-md-12">
          <label for="title" class="form-label">Title</label>
          <input name="title" type="text" class="form-control" id="title" value="{{ old('title')?old('title'): $category->title }}">
        </div>
        <div class="col-md-12">
          <label for="slug" class="form-label">Slug</label>
          <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug')?old('slug'): $category->slug }}">
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="description">{{ old('descripiton')?old('description'):$category->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @if ($category->image)
                    <img height="100" src="{{ asset('storage/images/categories/'.$category->image) }}"  alt="{{ $category->title }}" />
                    @else
                    <span class="text-danger">No  images uploaded</span>
                    @endif
          </div>
        <div class="col-md-4">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-select">
            <option selected>Choose...</option>
            <option {{ old('status') == 1 || $category->status == 1?'selected':'' }} value="1">Active</option>
            <option {{ old('status') == 2 || $category->status == 2?'selected':'' }}  value="2">Inactive</option>
          </select>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

</x-back-layout>
