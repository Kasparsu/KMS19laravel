@extends('layout')
@section('title', $post->title)
@section('content')
    <div class="album py-5 bg-light">
       <div class="container">
           <div class="card">
               <div class="card-body">
                   <h2 class="card-title">{{$post->title}}</h2>
                   <small class="text-muted">
                       {{$post->user->name}} - {{$post->created_at->diffForHumans()}}
                   </small>
                   <p>
                       {!! $post->body !!}
                   </p>
               </div>
           </div>
           <ul class="list-group">
               @auth
               <li class="list-group-item">
                   <form action="/{{$post->id}}/comment" method="POST">
                       @csrf
                       @error('body')
                        <div class="alert alert-danger">{{$message}}</div>
                       @enderror
                       <div class="form-group">
                           <label for="comment">Comment:</label>
                           <textarea
                               class="form-control"
                               name="body"
                               id="comment"
                               cols="5"
                               placeholder="Type your comment here..."></textarea>
                       </div>
                       <input type="submit" value="Comment" class="btn btn-primary">
                   </form>
               </li>
               @endauth
               @foreach($post->comments as $comment)
                   <li class="list-group-item">
                       <small class="text-muted">
                           {{$comment->user->name}} - {{$comment->created_at->diffForHumans()}}
                       </small>
                       <br>
                       {{$comment->body}}
                   </li>
               @endforeach

           </ul>
       </div>
    </div>
@endsection
