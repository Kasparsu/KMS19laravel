@extends('layout')
@section('title', 'Posts List')
@section('content')
    <div class="container">
        <form method="POST" action="/posts">
            @csrf
            <div class="form-group">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                @error('body')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="body">Body:</label>
                <textarea class="form-control" name="body" id="body"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Send">
        </form>
    </div>
@endsection
