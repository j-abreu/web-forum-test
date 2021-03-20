<!DOCTYPE html>
<html>
<head>
    <title>Web Forum</title>
    <!-- Styles -->
    <link href="/css/main.css" rel="stylesheet">
</head>
    <body>
        <div class="content-thread">
        <form action="/threads/update/{{$thread->id}}" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{$thread->title}}">
            <div class="red-text">
                <span>@error('title'){{$message}}@enderror</span>
            </div>
            <br>
            <label for="description">Description:</label>
            <br>
            <textarea name="description" id="description" cols="100" rows="10" placeholder="Enter a text">{{$thread->description}}</textarea>
            <div class="red-text">
                <span>@error('description'){{$message}}@enderror</span>
            </div>
            <br><br>
            <label for="name">Your name:</label>
            <input type="text" id="name" name="name" value="{{$thread->user_name}}">
            <input type="submit" value="save">
            <div class="red-text">
                <span>@error('name'){{$message}}@enderror</span>
            </div>
        </form>
        </div>
        <div class="button2 content"><a href="/threads" style="text-decoration:none">BACK</a></div>
    </body>
</html>