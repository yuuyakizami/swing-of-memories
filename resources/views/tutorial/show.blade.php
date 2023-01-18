@extends('layout.app')

@section('title', "Show Tutorials")

@section('content')
<h1>Tutorials</h1>
<div class="container">
    <h1>
    {{-- <a href="tutorial/{{ $tutorial->id}}">{{ $tutorial->title}}</a> --}}
    </h1>
</div>

{{-- <h1>{{$tutorial->title}}</h1>
<img src="{{$tutorial->video}}">
<h1>{{$tutorial->title_description}}</h1> --}}
@endsection