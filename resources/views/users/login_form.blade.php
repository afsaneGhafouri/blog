{{--@extends('layout')--}}

{{--@section('title')--}}
 {{--Login--}}
{{--@endsection--}}


{{--<div class="flex-center position-ref full-height">--}}
{{--@if (Route::has('login'))--}}
    {{--<div class="top-right links">--}}
        {{--@auth--}}
            {{--<a href="{{ url('/home') }}">Home</a>--}}
        {{--@else--}}
            {{--<a href="{{ route('login') }}">Login</a>--}}

            {{--@if (Route::has('register'))--}}
                {{--<a href="{{ route('register') }}">Register</a>--}}
            {{--@endif--}}
        {{--@endauth--}}
    {{--</div>--}}
{{--@endif--}}

{{--@section('content')--}}
    {{--<div class="m-b-md">--}}
        {{--<form method="post" action="/auth/login">--}}
            {{--@csrf--}}
            {{--Email : <input type="text" name="email"> <br >--}}
            {{--Password : <input type="password" name="password"> <br>--}}

            {{--<button>Login</button>--}}
        {{--</form>--}}
    {{--</div>--}}

    {{--<div class="links">--}}
        {{--<a href="/auth/register">Register</a>--}}
    {{--</div>--}}
{{--@endsection--}}
