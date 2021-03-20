<!DOCTYPE html>
<html>
    <head>

        <title>Web Forum</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <h1>Creating a new Thread</h1>
            <div class="wrapper create-thread">
                <form action="/threads" method="POST">
                    @csrf
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{old('title')}}">
                    <div class="red-text">
                    <span>@error('title'){{$message}}@enderror</span>
                    </div>
                    <br><br>
                    <label for="description">Description:</label>
                    <br>
                    <textarea name="description" id="description" cols="100" rows="10" placeholder="Enter a text">{{old('description')}}</textarea>
                    <div class="red-text">
                    <span>@error('description'){{$message}}@enderror</span>
                    </div>
                    <br><br>
                    <label for="name">Your name:</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}">
                    <input type="submit" value="Create">
                    <div class="red-text">
                    <span>@error('name'){{$message}}@enderror</span>
                    </div>
                    
                </form>
            </div>
            <br><br>
            <div class="button2"><a href="/threads">BACK</a></div>
            
        </div>
    </body>
</html>