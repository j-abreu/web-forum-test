<!DOCTYPE html>
<html>
<head>
<title>Web Forum</title>
        <!-- Styles -->
        <link href="/css/main.css" rel="stylesheet">
</head>
    <body>
        <div class="reply-content">
            <h3>First reply of thread <a href="/threads/{{$reply['thread_id']}}" style="text-decoration:none">{{$reply->thread_title}}</a></h3>
            <h3>{{$reply['user_name']}}:</h3>
            <div class="multiline"><h4>{{$reply['reply_text']}}</h4></div><br>
            <div class="created-at">[{{$reply['created_at']}}]</div>
            <div class="button2 content"><a href="/threads" style="text-decoration:none">BACK</a></div>
        </div>
    </body>
</html>