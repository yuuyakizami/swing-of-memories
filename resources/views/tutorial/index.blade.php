@extends('layout.app')

@section('title', "Show Tutorials")

@section('content')
<div class="container">
    @foreach($tutorial as $item)
    <div class="list-group">
    <a class="btn btn-primary mb-3 rounded-pill" href="{{route('show-tutorial', $item->id)}}">
        {{$item->title}}</a>
    </div>
@endforeach
</div>
@endsection
{{-- @endforelse --}}