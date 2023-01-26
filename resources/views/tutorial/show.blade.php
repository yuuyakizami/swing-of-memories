@extends('layout.app')

@section('title', "Show Tutorials")

@section('content')
<div class="container">
   <h1>{{$tutorial->title}}</h1>
   {{-- <p>{{$tutorial->video}}</p> --}}
   <p>{{$tutorial->title_description}}</p>
   <p>{{$tutorial->title_lesson}}</p>


<form action="{{route('delete-tutorial', $tutorial->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger rounded-pill" name="Delete">Delete</button>
</form>
<form action="{{route('edit-tutorial', $tutorial->id)}}" method="GET">
    @csrf
    <button class="btn btn-primary rounded-pill" name="Edit">Edit</button>
</form>
</div>
@endsection