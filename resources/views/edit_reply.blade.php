<!DOCTYPE html>
<html>
<head>
    <title>Web Forum</title>
    <!-- Styles -->
    <link href="/css/main.css" rel="stylesheet">
</head>
    <body>
        <div class="reply-content">
        <form action="/replies/update/{{$reply->id}}" method="POST">
            @csrf
            <label for="reply">Your reply:</label>
            <br>
            <textarea name="reply" id="reply" cols="100" rows="10" placeholder="Enter a text">{{$reply->reply_text}}</textarea>
            <div class="red-text">
                <span>@error('reply'){{$message}}@enderror</span>
            </div>
            <br><br>
            <label for="name">Your name:</label>
            <input type="text" id="name" name="name" value="{{$reply->user_name}}">
            <input type="submit" value="save">
            <div class="red-text">
                <span>@error('name'){{$message}}@enderror</span>
            </div>
        </form>
        <div class="button2 content"><a href="/threads/{{$reply->thread_id}}" style="text-decoration:none">BACK</a></div>
        </div>
    </body>
</html>