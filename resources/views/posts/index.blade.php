@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1 class="stylish-heading">Posts</h1>
    @if(count($posts) > 0)
        @if(!Auth::guest())
                <a href="/posts/create" class="btn btn-outline-primary">Create Post</a>
                <br><br>
        @endif
        @foreach($posts as $post)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection