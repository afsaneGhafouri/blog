@extends('layout')

@section('title')
    Update post . {{$post->id}}
@endsection

@section('content')
    <div class="m-b-md">
        <form method="post" action="/admin/posts/{{$post->id}}/update" style="margin-top: 300px">
            @csrf
            @method('PUT')
            Subject : <input type="text"  name="subject" value={{$post->subject}}><br >
            Content : <textarea name="content" >{{$post->content}}</textarea><br>
            <input type="checkbox" name="is_published"  @if($post->is_published) {{ "checked" }} @endif>Is published <br>

            <button>Update</button>
        </form>

    </div>


@endsection
