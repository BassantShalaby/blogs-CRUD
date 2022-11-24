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

    <div class="button" style="margin:30px">
        <a class="btn btn-info" href="{{ route('categories.create')}}">Create Category</a>
    </div>

    <div class="table-container">
<table class="table" style="text-align: center">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Number of Posts</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
            <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->posts->count()}}</a></td>
            <td style="width: 15%">
                <div>
                    <span class="float-left">
                    <a class="btn btn-outline-secondary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    </span>

                    <form method="POST" action="{{ route('categories.destroy',$category->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
    </div>
</div>

</div>
@endsection
