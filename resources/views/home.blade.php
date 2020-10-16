@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            {{ $posts->links() }}
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            @if($post->image)
                            <img src="{{$post->image->filename}}" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">{{$post->title}}</h3>
                                <p class="card-text">{!! $post->excerpt !!} ...</p>
                                <small class="text-muted">{{$post->user->name}}</small>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a
                                            type="button"
                                            class="btn btn-sm btn-outline-secondary"
                                            href="/{{$post->id}}">View</a>
                                        @auth
                                            <a
                                                type="button"
                                                class="btn btn-sm btn-outline-secondary"
                                                href="/posts/{{$post->id}}/edit">Edit</a>
                                        @endauth
                                    </div>
                                    <small class="text-muted">{{$post->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
