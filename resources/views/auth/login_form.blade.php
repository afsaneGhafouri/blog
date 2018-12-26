@extends('layout')

@section('title')
    User login
@endsection

@section('content')
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

    <div class="m-b-md flex-center">
        <form method="post" action="/auth/login" style="border: 1px solid gray; padding: 30px 50px; margin-top: 100px">
            @csrf

            Email : <input type="text" name="email"> <br >
            Password : <input type="password" name="password"> <br>


            <button>Login</button>
        </form>
    </div>

@endsection
