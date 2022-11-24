@extends('layouts.app')

@section('content')
<div class="container">
<div class="btn container" style="width:30%">
    <span class="button float-left" style="margin-top:30px">
        <a type="button" class="btn btn-outline-info" href="{{ route('posts.create')}}">Create Post</a>
    </span>

      <div class="button" style="margin-top: 30px">
        <a type="button" class="btn btn-outline-info" href="{{ route('categories.index')}}">Show Categories</a>
    </div>
</div>

      <div class="card-content" style="margin:50px">
        <h4>{{$category->name}} Category Posts</h4>
      </div>


      <div class="row row-cols-1 row-cols-md-2 g-4">
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
@endsection
