@extends('layout')

@section('title')
   Create post
@endsection

@section('content')
<div class="m-b-md">
    <form method="post" action="/admin/posts/create" style="margin-top: 300px">
        @csrf
        Subject : <input type="text"  name="subject"><br >
        Content : <textarea name="content"></textarea><br>
        <input type="checkbox" name="is_published"  checked>Is published <br>
        {{--Is published : <input type="text" name="is_published"> <br>--}}

        <button>Create</button>
    </form>
</div>
@endsection
