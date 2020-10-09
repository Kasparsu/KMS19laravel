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
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
                        <form method="post" action="/posts/{{$post->id}}">
                            @method('delete')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
@endsection
