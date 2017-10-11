<form action="{{ route('threads.replies.store', $thread->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <textarea
        name="body"
        id="body"
        cols="30" rows="4"
        placeholder="Your reply here..."
        class="form-control">
        </textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Reply</button>
    </div>
</form>