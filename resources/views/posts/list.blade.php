@extends('layout')

@section('title')
    list
@endsection

@section('content')
<div class="m-b-md">

        @forelse ($posts as $post)
            <div>
                <p>
                    {{--TODO: add posts id--}}
                    <a href="{{ url('posts', $post->slug) }}">{{ $post->subject }} - {{ $post->comments_count }} Comment(s)</a>
                </p>
            </div>
        @empty
            <div>
                <p>There were no posts available.</p>
            </div>
        @endforelse

</div>

@endsection
