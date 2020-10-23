@extends('layout')
@section('title', $post->title)
@section('content')
    <div class="album py-5 bg-light">
       <div class="container">
           <div class="card">
               @if($post->images->count())
                   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                       <ol class="carousel-indicators">
                           @foreach($post->images as $key=>$image)
                            <li
                                data-target="#carouselExampleIndicators"
                                data-slide-to="{{$key}}"
                                class="{{ $key==0 ? 'active' : '' }}"></li>
                           @endforeach
                       </ol>
                       <div class="carousel-inner">
                           @foreach($post->images as $key=>$image)
                               <div class="carousel-item {{ $key==0 ? 'active' : '' }}">
                                   <img src="{{$image->filename}}" class="d-block w-100">
                               </div>
                           @endforeach
                       </div>
                       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="sr-only">Previous</span>
                       </a>
                       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="sr-only">Next</span>
                       </a>
                   </div>
               @endif
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
