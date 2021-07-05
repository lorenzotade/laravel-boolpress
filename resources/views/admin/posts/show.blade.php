@extends('layouts.app')

@section('content')

  <div class="container">

    <a href="{{route('admin.posts.index')}}" class="btn btn-secondary mb-4"><-- Back</a>

    <h1>{{$post->title}}</h1>

    @if ($post->category)
      <h3>Categoria: {{$post->category->name}}</h3>
    @else
      <h3>Nessuna categoria.</h3>
    @endif
    

    <p>{{$post->description}}</p>

    <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary">EDIT</a>
    
  </div>
  
@endsection