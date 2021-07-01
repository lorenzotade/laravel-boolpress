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
        <input type="text" name="title" id="title" class="form-control">
      </div>

      <div class="mb-3">
        <label for="description" class="label-control">Description:</label>
        <textarea name="description" id="description" rows="4" class="form-control"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">SUBMIT</button>
      <button type="reset" class="btn btn-danger mx-3">RESET</button>
      
    </form>

  </div>

  
@endsection