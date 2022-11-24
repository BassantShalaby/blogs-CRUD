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
        <a type="button" class="btn btn-outline-info" href="{{ route('categories.index')}}">Show Categories</a>
    </div>
    <div style="margin-top:40px;">
    <h4>Edit Category</h4>
    </div>

<div class="card-body" style="margin-top:15px">
    <form method="POST" action="{{ route('categories.update',$category->id) }}">
         @csrf
         @method('PUT')
      <div class="form-group">
        <label >Name</label>
        <input type="text"  name="name" class="form-control"  value="{{ $category->name }}" required>
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a  class="btn btn-outline-secondary" href="{{ route('categories.index')}}">Cancel</a>
    </form>
  </div>
</div>

@endsection
