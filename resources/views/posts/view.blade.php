@extends('layout')

@section('title')
    {{ $post->slug }}
@endsection

@section('content')
<div class="m-b-md post-view" style="margin-top: 300px">
    <div>
        <h1>
            {{ $post->subject }}
        </h1>
    </div>

        <div>
            <p>
                {{ $post->content }}
            </p>
            <p class="score">
                Score:
                <span>{{ $post->score }}</span>
            </p>
            <p class="vote">
                <span id="upvote">Up vote</span>
                <span id="downvote">Down vote</span>
            </p>
        </div>
    <hr>

    <h2>Comments</h2>
    <hr>
    @forelse ( $comments as $comment)
        <div>
            <p>
               Title: {{ $comment->title }} <br>
               Content: {{ $comment->content }} <br>
                User : {{ $comment->user->name }} <hr>
            </p>
        </div>
    @empty
        <div>
            <p>There were no comments available.</p>
        </div>
    @endforelse

    @auth
        <form method="post" action="/posts/{{$post->id}}/comment" style="border: 1px solid gray; padding: 30px 50px; margin-top: 100px">
            @csrf

            Title : <input type="text" name="title"> <br >
            Content : <textarea  name="content"></textarea> <br>

            <button>Submit</button>
        </form>
    @else

        <a href="/auth/login" >For adding comment you have to log in</a>
    @endauth




</div>

@endsection

@section('extra-javascript')
    <script>
        $('#upvote').click(function () {
            $.ajax({
                method: "PATCH",
                url: "/api/posts/" + {{ $post->id }} + "/upvote"
            })
                .done(function( response ) {
                    $('.score span').text(response.score);
                });
        });

        $('#downvote').click(function () {
            $.ajax({
                method: "PATCH",
                url: "/api/posts/" + {{ $post->id }} + "/downvote"
            })
                .done(function( response ) {
                    $('.score span').text(response.score);
                });
        });
    </script>
@endsection
