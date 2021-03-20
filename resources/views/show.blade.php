<!DOCTYPE html>
<html>
    <head>
        <title>Web Forum</title>
        <!-- Styles -->
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="content-thread">
            <div class="top-right button1">
                <a href="/threads">HOME</a>
            </div>

            <h1>{{$thread['title']}}</h1>
            <h3>- {{$thread['user_name']}}</h3>
            <div class="multiline">{{$thread['description']}}</div>
            <hr>
            @if ($thereIsReplies)
                <h2>Replies:</h2>
                @foreach($replies as $reply)
                    <h3>{{$reply['user_name']}}:</h3>
                    <div class="multiline">{{$reply['reply_text']}}</div><br>
                    <form action="/replies/edit/{{$reply['id']}}" method="GET">
                            @csrf
                            <button class="button3">Edit this reply</button>
                    </form>
                    <br>
                    <form action="/replies/{{$reply['id']}}" method="POST">
                        @csrf
                        <button class="button3">Delete this reply</button>
                    </form>
                    <br>
                @endforeach
            @else
                <h2>No replies</h2>
            @endif
            <hr>
            <form action="/replies?threadid={{$thread->id}}" method="POST">
                @csrf
                <label for="reply">Your reply:</label>
                <br>
                <textarea name="reply" id="reply" cols="100" rows="10" placeholder="Enter a text">{{old('reply')}}</textarea>
                <div class="red-text">
                    <span>@error('reply'){{$message}}@enderror</span>
                </div>
                <br><br>
                <label for="name">Your name:</label>
                <input type="text" id="name" name="name" value="{{old('name')}}">
                <input type="submit" value="reply">
                <div class="red-text">
                    <span>@error('name'){{$message}}@enderror</span>
                </div>
            </form>
        </div>
        <br><br>
    </body>
</html>