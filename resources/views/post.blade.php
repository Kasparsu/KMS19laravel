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
               <li class="list-group-item">
                   <form>
                       <div class="form-group">
                           <label for="comment">Comment:</label>
                           <textarea
                               class="form-control"
                               name="comment"
                               id="comment"
                               cols="5"
                               placeholder="Type your comment here..."></textarea>
                       </div>
                   </form>
               </li>
               <li class="list-group-item">
                   <small class="text-muted">
                       Username - 4 hours ago
                   </small>
                   <br>
                   asdasdasd adsasd asdasddasdasd adasdasd
               </li>

           </ul>
       </div>
    </div>
@endsection
