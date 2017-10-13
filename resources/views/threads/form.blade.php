<form action="{{ route('threads.store') }}" method="POST">
    {{ csrf_field() }}

    @if (count($errors))
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif        

    <div class="form-group">
        <label for="channel_id">Channel</label>
        <select name="channel_id" id="channel_id" class="form-control">
            <option value="">Choose a channel</option>
            @foreach (\App\Channel::with('threads')->has('threads')->get() as $channel)
                <option 
                    value="{{ $channel->id }}"
                    {{ ($channel->id != old('channel_id')) ? '' : 'selected' }}
                    >{{ $channel->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="Thread title here..."/>
    </div>    
    <div class="form-group">
        <textarea
        name="body"
        value="{{ old("body") }}"
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