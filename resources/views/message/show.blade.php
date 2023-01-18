@extends('layout.app')

@section('title', "Show Message")

@section('content')
<h1>Hello</h1>
<h1>{{ $message->name }}</h1>
<h1>{{ $message->message }}</h1>
@endsection