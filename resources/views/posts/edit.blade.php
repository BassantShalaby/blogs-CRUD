@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container mt-1">
        @if($errors->any())
         @foreach($errors->all() as $error)
         <div class="alert alert-danger" role="alert"style="margin-top: 20px">
            {{$error}}
         </div>
         @endforeach
        @endif
    </div>
    <div style="margin: 25px">
        <a type="button" class="btn btn-outline-info" href="{{ route('posts.index')}}">Show Posts</a>
    </div>
    <div style="margin-top:40px;">
    <h4>Edit Post</h4>
    </div>

<div class="card-body" style="margin-top:15px">
    <form method="POST" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="form-group">
            <label >Title</label>
            <input type="text"  value="{{ $post->title }}" name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description"  class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image"  class="form-control" required>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach
            </select>
          </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a  class="btn btn-outline-secondary" href="{{ route('posts.index')}}">Cancel</a>
    </form>
  </div>
</div>

@endsection
