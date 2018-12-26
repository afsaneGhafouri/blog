@extends('layout')

@section('title')
    User register
@endsection

@section('content')
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <form method="post" action="/auth/register">
        @csrf
        Name : <input type="text"  name="name"><br >
        Email : <input type="text" name="email"> <br >
        Password : <input type="password" name="password"> <br>
        Confirm password : <input type="password" name="confirm_password"> <br>

        <button>Register</button>
    </form>

        <div class="header">
            @if(auth()->user())
                Hello {{ auth()->user()->name }}
                <a href="/auth/logout">log Out</a>
            @else
                <a href="/auth/login">Login</a>
            @endif
        </div>

</div>
</body>

@endsection
