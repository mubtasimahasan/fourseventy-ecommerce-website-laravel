@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        @if(!Auth::guest())
            @if(Auth::user()->id == $comment->user_id)
                {!!Form::open(['action' => ['CommentController@destroy', $comment->id], 
                            'method' => 'POST', 'class' => 'form-group'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                {!!Form::close()!!}
            @endif
            <a href="" id="reply"></a>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="body" class="form-control" placeholder="Write"/>
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-outline-success" value="Reply" />
                </div>
            </form>
        @endif

        @include('posts.comment', ['comments' => $comment->replies])
    </div>
@endforeach