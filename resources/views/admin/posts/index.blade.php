@extends('layouts.app')

@section('content')

  <div class="container">

    <h1 class="mb-4">I miei posts</h1>

    @if (session('deleted'))

      <div class="alert alert-success">
        <strong>{{session('deleted')}}</strong> was deleted.
      </div>

    @endif

    <table class="table">

      <thead>

        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Tag</th>
          <th>Category</th>
          <th colspan="3">Actions</th>
        </tr>

      </thead>

      <tbody>

        @foreach ($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>
              @forelse ($post->tags as $tag)
                <span class="badge badge-primary">{{$tag->name}}</span>
              @empty
                -
              @endforelse
            </td>
            @if ($post->category)
              <td>{{$post->category->name}}</td>
            @else
              <td>-</td>
            @endif
            <td><a href="{{route('admin.posts.show', $post)}}" class="btn btn-primary">SHOW</a></td>
            <td><a href="{{route('admin.posts.edit', $post)}}" class="btn btn-secondary">EDIT</a></td>
            <td>
              <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">DELETE</button>
              </form>
            </td>
          </tr>
        @endforeach

      </tbody>

    </table>

  </div>
  
@endsection