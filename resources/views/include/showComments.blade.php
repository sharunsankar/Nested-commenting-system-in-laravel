@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_comment_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->text }}</p>

        <form method="post" action="{{ route('comment.add') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="text" class="form-control" />
                <input type="hidden" name="article_id" value="{{ $article_id }}" />
                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>

        @include('include.showComments', ['comments' => $comment->replies])
        
    </div>
@endforeach