@extends('layout')
@section('title', 'Posts List')
@section('content')
    <div class="container">
        <form method="POST" action="/posts">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Send">
        </form>
    </div>
@endsection
