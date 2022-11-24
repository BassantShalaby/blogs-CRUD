@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container mt-4">
        @if($errors->any())
         @foreach($errors->all() as $error)
         <div class="alert alert-danger" role="alert"style="margin-top: 20px">
            {{$error}}
         </div>
         @endforeach
        @endif
    </div>
<div style="margin-top:25px;">
<h4>Create Post</h4>
</div>

    <div class="card-body">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label >Title</label>
            <input type="text"  name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach
            </select>
            {{-- {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!} --}}
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a  class="btn btn-outline-secondary" href="{{ route('posts.index')}}">Cancel</a>
        </form>
      </div>
    </div>


@endsection
