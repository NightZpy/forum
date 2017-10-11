<form action="{{ route('threads.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Thread title here..."/>
    </div>
    <div class="form-group">
        <textarea
        name="body"
        id="body"
        cols="30" rows="4"
        placeholder="Your content here..."
        class="form-control">
        </textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Post it!</button>
    </div>
</form>