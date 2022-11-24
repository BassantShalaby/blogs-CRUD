@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin: 25px">
        <a type="button" class="btn btn-outline-info" href="{{ route('posts.index')}}">Show Posts</a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="card" style="margin-bottom:20px">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->description}}</p>
              <p class="card-text"><small class="text-muted">Category: {{$post->category->name}}</small></p>
              <p class="card-text"><small class="text-muted">Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</small></p>

            </div>
            <img height="350px" src="{{ asset('images/' . $post->image_path) }}" class="card-img-bottom" alt="...">
            <div class="card-footer" style="margin-top:10px;">
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
@endsection
