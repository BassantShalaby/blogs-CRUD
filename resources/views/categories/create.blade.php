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
    <div style="margin-top: 25px">
        <a type="button" class="btn btn-outline-info" href="{{ route('categories.index')}}">Show Categories</a>
    </div>
    <div style="margin-top:40px;">
    <h4>Create Category</h4>
    </div>

<div class="card-body" style="margin-top:15px">
    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
        <label >Name</label>
        <input type="text"  name="name" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a  class="btn btn-outline-secondary" href="{{ route('categories.index')}}">Cancel</a>

    </form>
  </div>
</div>

@endsection
