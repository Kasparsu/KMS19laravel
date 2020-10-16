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
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>{{$post->title}}</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$post->title}}</text></svg>
                            <div class="card-body">
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
