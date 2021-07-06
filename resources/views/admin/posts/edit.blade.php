@extends('layouts.app')

@section('content')

<div class="container">

  <a href="{{route('admin.posts.show', $post)}}" class="btn btn-secondary mb-4"><-- Back</a>

  <h1>{{$post->title}}</h1>

  <form action="{{route('admin.posts.update', $post)}}" method="POST">

    @method('patch')
    @csrf

    <div class="mb-3">
      <label for="title" class="label-control">Title:</label>
      <input type="text" name="title" id="title" value="{{old('title', $post->title)}}" class="form-control @error('title') is-invalid @enderror">
      @error('title')
        <span class="invalid-feedback">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="category_id" class="label-control">Categoria:</label>
      <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="">-- Seleziona una categoria --</option>
        @foreach($categories as $category)
          <option @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      @error('category_id')
        <span class="invalid-feedback">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-3">
      <h6>Tag</h6>
      @foreach ($tags as $tag)
        <span class="d-inline-block mr-3">
          <input type="checkbox"
            id="tag{{$loop->iteration}}"
            value="{{$tag->id}}"
            name="tags[]"
            @if ($errors->any() && in_array($tag->id, old('tags', []))) checked 
            @elseif (!$errors->any() && $post->tags->contains($tag->id)) checked
            @endif
          >
          <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
        </span>
      @endforeach
      @error('tags')
        <span class="invalid-feedback">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description" class="label-control">Description:</label>
      <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{old('description', $post->description)}}</textarea>
      @error('description')
        <span class="invalid-feedback">{{$message}}</span>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">SUBMIT</button>

  </form>
  
</div>
  
@endsection