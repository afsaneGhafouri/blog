@extends('layout')

@section('title')
   User Profile
@endsection

@section('content')
    <div class="m-b-md">

        <form method="get" action="/auth/profile">
            @csrf
            Welcome {{ $user->name }} <br />
            Name: {{ $user->name }} <br />
            email: {{ $user->email }} <br />
        </form>
    </div>

    <a href="/posts" >Posts list</a>

    <hr>

    @forelse ( $comments as $comment)
        <div>
            <p>
                Title: {{ $comment->title }} <br>
                Content: {{ $comment->content }} <br>
                {{--Created Date : {{ $comment->created_at->diffForHumans() }} <br >--}}
                Created Date  : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at)->format('d F Y H:i') }} <br>
                <a href="/posts/{{ $comment->post->slug }}" >Reading the complete post</a>
                <hr>
            </p>
        </div>
    @empty
        <div>
            <p>There were no comments available.</p>
        </div>
    @endforelse



@endsection
