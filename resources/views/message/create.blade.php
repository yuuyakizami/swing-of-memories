@extends('layout.app')

@section('title', "Message")

@section('content')
<form class="form-group container-sm" action="{{ route('message.store')}}" method="POST">
@csrf
<div><label class="form-label" for="name">Name:</div>
<div><input class="form-control mb-3" type="text" name="name" value="{{ old('name')}}"></div>
<div><label class="form-label" for="message">Message:</label></div>
<div><textarea class="form-control mb-3" name="message" value="{{ old('message')}}"></textarea></div>
<button class="w-100 btn btn-primary text-center" type="submit" name="submit">Submit</button>
</form>
@endsection