@extends('layout.app')

@section('title', "Login")

@section('content')

<form class="form-group container-sm" action="{{ route('login')}}" method="POST">
    @csrf
    <div><label class="form-label" for="email">E-mail:</div>

    <div><input class="form-control mb-3  {{ $errors->has('email') ? 'is-invalid': ''}}" type="text" name="email" id="email" value="{{ old('email')}}" required>

        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email')}}</strong>
        </span>
        @endif</div>

    <div><label class="form-label" for="password">Password:</div>
    <div><input class="form-control mb-3  {{ $errors->has('password') ? 'is-invalid': ''}}" type="password" id="password" name="password" required>
        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password')}}</strong>
        </span>
        @endif
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" value="{{ old('remember')}} ? 'checked':''">
        <label for="remember" class="form-check-label">Remember Me</label>
    </div>
    <button class="w-100 btn btn-primary text-center" type="submit" name="submit">Login</button>

    </form>

@endsection