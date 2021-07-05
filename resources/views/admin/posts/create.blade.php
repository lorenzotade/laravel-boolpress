@extends('layouts.app')

@section('content')

  <div class="container">

    <a href="{{route('admin.posts.index')}}" class="btn btn-secondary mb-4"><-- Back</a>

    <h1>Create a new post</h1>
  
    <form action="{{route('admin.posts.store')}}" method="POST">

      @method('post')
      @csrf

      <div class="mb-3">
        <label for="title" class="label-control">Title:</label>
        <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
          <span class="invalid-feedback">{{$message}}</span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="category_id" class="label-control">Categoria:</label>
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
          <option value="">-- Seleziona una categoria --</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        @error('category_id')
        <span class="invalid-feedback">{{$message}}</span>
      @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="label-control">Description:</label>
        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
        @error('description')
          <span class="invalid-feedback">{{$message}}</span>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">SUBMIT</button>
      <button type="reset" class="btn btn-danger mx-3">RESET</button>
      
    </form>

  </div>

  
@endsection