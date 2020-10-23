@extends('layout')
@section('title', 'Posts List')
@section('content')
    <div class="container">
        <form method="POST" action="/posts" enctype="multipart/form-data" id="form">
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
            <div class="form-group">
                @error('image')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" name="image[]" id="image" multiple>
            </div>
            <input type="submit" class="btn btn-primary" value="Send">
        </form>
        <form action="/api/upload" class="dropzone" id="upload">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </form>
    </div>
@endsection

@section('styles')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
    <script>
        Dropzone.options.upload = {
            init: function() {
                this.on("success", function(file, response) {
                    console.log(response);
                    let el = document.createElement('input');
                    el.type = 'hidden';
                    el.name = 'imageids[]';
                    el.value = response.id;
                    document.getElementById('form')
                        .append(el);
                });
            }
        }
    </script>
@endsection

