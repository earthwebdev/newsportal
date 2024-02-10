<x-back-layout>
    <h1>Articles</h1>
    <a href="{{ route('article.create') }}" class="btn btn-primary">Add Article</a>

        <x-base.back.alert-message />

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>

            <th scope="col">status</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->slug }}</td>

                <td>{{ $article->status == 'active'?'Active':'Inactive' }}</td>
                <td>
                    @if ($article->image)
                    <img height="100" src="{{ asset('storage/images/articles/'.$article->image) }}"  alt="{{ $article->title }}" />
                    @else
                    <span class="text-danger">No  images uploaded</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('article.edit', $article->id) }}" title="edit" class="btn btn-info">Edit</a>
                    <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure you want to delete this article?')" type="submit">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach


        </tbody>
      </table>
      {{ $articles->links() }}
</x-back-layout>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('common.sidebar-view')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Articles content goes heres
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 --}}
