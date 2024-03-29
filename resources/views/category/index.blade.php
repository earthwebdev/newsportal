<x-back-layout>
    <h1>Categories</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>

        <x-base.back.alert-message />

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Articles</th>
            <th scope="col">status</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->articles_count }}</td>
                <td>{{ $category->status?'Active':'Inactive' }}</td>
                <td>
                    @if ($category->image)
                    <img height="100" src="{{ asset('storage/images/categories/'.$category->image) }}"  alt="{{ $category->title }}" />
                    @else
                    <span class="text-danger">No  images uploaded</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" title="edit" class="btn btn-info">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure you want to delete this category?')" type="submit">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach


        </tbody>
      </table>
      {{ $categories->links() }}
</x-back-layout>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('common.sidebar-view')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Categories content goes heres
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 --}}
