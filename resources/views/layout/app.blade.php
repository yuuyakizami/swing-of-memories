<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MySqlEdu - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset(mix('/css/app.css'))}}" />
    <script src="{{ asset(mix('/js/app.js'))}}" defer></script>
    <style>
        body {
            background-color: antiquewhite;
        }
    </style>
</head>
<body>
    {{-- Navigation --}}
    <div class="container-fluid mb-5 bg-white shadow-sm">
        <nav class="navbar">
        <div class="navbar-brand ml-3 mp-3">MySqlEdu @yield('title')</div>
        <ul class="nav row justify-content-end">
            <li class="nav-item col-auto"><a class="nav-link" href="{{ route('home.index')}}" role="button">Home</a></li>
            <li class="nav-item col-auto"><a class="nav-link" href="{{ route('message.create')}}" role="button">Message</a></li>
            <li class="nav-item col-auto"><a class="nav-link" href="{{ route('home.about')}}" role="button">About</a></li>
            @guest
            <li class="nav-item col-auto"><a class="nav-link" href="{{ route('register')}}" role="button">Register</a></li>
            <li class="nav-item col-auto"><a class="nav-link" href="{{ route('login')}}" role="button">Login</a></li>
            @else
             {{-- Tutorial --}}
             @auth()
             <li class="nav-item col-auto"><a class="nav-link" href="{{ route('tutorial.index')}}">Show Tutorials</a></li>
             <li class="nav-item col-auto"><a class="nav-link" href="{{ route('tutorial.create')}}">Create Tutorial</a></li>
             <li class="nav-item col-auto"><a class="nav-link href="{{ route('logout')}} onclick="event.preventDefault();document.getElementById('logout-form').submit();" role="button">Logout</a></li>
             <form id="logout-form" action="{{ route('logout')}}" method="post" style="display: none">@csrf</form>
             @endauth
            @endguest
        </ul>
        </nav>
    </div>
    <div class="container-sm">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif
    @yield('content')

    </div>
    {{-- mr-md-auto --}}
    {{-- Footer Content --}}
    <div class="container-fluid fixed-bottom" style="background-color: coral">
        @yield('footer')
        </div>
</body>
</html>