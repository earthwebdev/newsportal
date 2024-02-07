<x-back-layout>
    <h1>Create Category</h1>
    <form action="{{ route('category.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
          <label for="title" class="form-label">Title</label>
          <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="col-md-12">
          <label for="slug" class="form-label">Slug</label>
          <input name="slug" type="text" class="form-control" id="slug">
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control-file" id="image">
          </div>
        <div class="col-md-4">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-select">
            <option selected>Choose...</option>
            <option value="1">Active</option>
            <option value="2">Inactive</option>
          </select>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
</x-back-layout>
