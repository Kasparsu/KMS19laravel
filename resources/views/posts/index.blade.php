@extends('layout')
@section('title', 'Posts List')
@section('content')
<div class="container">
    <a href="/posts/create" class="btn btn-primary">Create</a>
    {{ $posts->links() }}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a href="/posts/{{$post->id}}" class="btn btn-info">View</a>
                        <a href="/posts/edit/{{$post->id}}" class="btn btn-warning">Edit</a>
                        <a href="/posts/delete/{{$post->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
@endsection
