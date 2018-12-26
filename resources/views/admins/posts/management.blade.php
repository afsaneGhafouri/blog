@extends('layout')

@section('title')
    Posts management
@endsection

@section('content')
    <div class="m-b-md">

        <p>
            Management Panel
        </p> <br > <br >

        <a href="/admin/posts/create">Add new post</a>

        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 80%;
                margin: 60px auto;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 10px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>

        <table>
            <thead>
            <tr>
                <th> id</th>
                <th> subject</th>
                <th> score</th>
                <th> is_published </th>
                <th> action </th>

            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td> {{$post->id}} </td>
                    <td> {{$post->subject}} </td>
                    <td> {{$post->score}} </td>
                    <td> {{$post->is_published}} </td>
                    <td> <a href="/admin/posts/{{$post->id}}/update">Update post</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
