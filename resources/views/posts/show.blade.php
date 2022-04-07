@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-dark">Go Back</a>
    <br><br>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    <hr>

    <h4>Comments</h4>
    <hr>
    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
    <hr>

    @if(!Auth::guest())
        <h4>Add comment</h4>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="body" placeholder="Write"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-primary" value="Comment" />
            </div>
        </form>
    @endif
@endsection