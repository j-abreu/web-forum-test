<!DOCTYPE html>
<html>
    <head>
        <title>Web Forum</title>
        <!-- Styles -->
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="content-thread">
            <div class="top-right">
                <a href="/threads">HOME</a>
            </div>

            <h1>{{$thread['title']}}</h1>
            <h3>-{{$thread['user_name']}}</h3>
            <p>{{$thread['description']}}</p>
            <hr>
            @if ($thereIsReplies)
                <h2>Replies:</h2>
                @foreach($replies as $reply)
                    <h3>{{$reply['user_name']}}:</h3>
                    <p>{{$reply['reply_text']}}</p>
                    <form action="/replies/{{$reply['id']}}" method="POST">
                        @csrf
                        <button>Delete this reply</button>
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
                <input type="text" id="reply" name="reply">
                <br><br>
                <label for="name">Your name:</label>
                <input type="text" id="name" name="name">
                <input type="submit" value="reply">
            </form>
        </div>
    </body>
</html>