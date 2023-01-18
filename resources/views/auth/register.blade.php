@extends('layout.app')

@section('title', "Register")

@section('content')

<form class="form-group container-sm" action="{{ route('register')}}" method="POST">
    @csrf
    <div><label for="name" class="form-label" for="name">Name:</div>
    <div><input class="form-control mb-3  {{ $errors->has('name') ? 'is-invalid':''}}" type="text" id="name"name="name" value="{{ old('name')}}" required>
        @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name')}}</strong>
        </span>
        @endif
    </div>
   
    <div><label class="form-label" for="email">E-mail:</div>

    <div><input class="form-control mb-3  {{ $errors->has('email') ? 'is-invalid': ''}}" type="text" name="email" id="email" value="{{ old('email')}}" required>

        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email')}}</strong>
        </span>
        @endif</div>

    <div><label class="form-label" for="password">Password:</div>
    <div><input class="form-control mb-3  {{ $errors->has('password') ? 'is-invalid': 'valid'}}" type="password" id="password" name="password" required>
        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password')}}</strong>
        </span>
        @endif
    </div>
    <div><label class="form-label" for="password_confirmation">Retyped Password:</div>
    <div><input class="form-control mb-3 {{ $errors->has('password_confirmation') ? 'is-invalid': 'valid'}}" type="password" name="password_confirmation" id="password_confirmation" required>
        @if ($errors->has('password_confirmation'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password_confirmation')}}</strong>
        </span>
        @endif</div>
    <button class="w-100 btn btn-primary text-center" type="submit" name="submit">Submit</button>
    </form>

@endsection