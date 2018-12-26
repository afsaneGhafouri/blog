@extends('layout')

@section('title')
  Admin Profile
@endsection

@section('content')
<div class="m-b-md">

<form method="get" action="/admin/profile">
    @csrf
    Welcome {{ $user->name }} <br />
    Name: {{ $user->name }} <br />
    email: {{ $user->email }} <br />
</form>

    <a href="/admin/posts/management">Management panel</a> <br> <br>
    <a href="/admin/register">Register new admin</a>

</div>

@endsection
