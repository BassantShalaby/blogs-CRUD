@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-content" style="margin:25px">

  @if(session()->has('success'))
    <div class="alert alert-success" role="alert"
     style=" display:block ;margin:auto;width:30%;text-align:center">
        {{ session()->get('success') }}
    </div>
  @endif

  <div class="btn container" style="width:30%">
    <span class="button float-left" style="margin-top:30px">
        <a type="button" class="btn btn-outline-info" href="{{ route('posts.create')}}">Create Post</a>
    </span>
    {{-- <div class="dropdown" style="margin-top:30px">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Filter by Category
        </button>
        <ul class="dropdown-menu">
            @foreach ($categories as $category)
          <li><a class="dropdown-item" href="{{ route('categories.show', $category->id)}}">{{$category->name}}</a></li>
          <li><hr class="dropdown-divider"></li>
          @endforeach
          <li><a class="dropdown-item" href="{{ route('categories.index') }}">Show All Categories</a></li>
        </ul>
      </div> --}}
</div>

  <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top:30px">
        @foreach($posts as $post)
        <div class="col-4">
        <div class="card" style="width: 20rem; height:470px; display:inline-block; margin-bottom:10px">
            <img height="250px" src="{{ asset('images/' . $post->image_path) }}" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{Str::limit($post->description, 20)}}</p>
            </div>
              <div class="card-footer">
                <a href="{{ route('posts.show',$post->id) }}" class="btn btn-success">Read more</a>
                <div style="margin-top:10px;">
                    <span class="float-left">
                    <a  style="margin-right:7px;" class="btn btn-outline-secondary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    </span>

                    <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button  class="btn btn-outline-danger" type="submit">Delete</button>
                </form>
                </div>
              </div>

          </div>
        </div>
 @endforeach

    </div>

  </div>
</div>

@endsection





