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
            <h1>Crie uma Thread</h1>
            <div class="wrapper create-thread">
                <form action="/threads" method="POST">
                    @csrf
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title">
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description">
                    <label for="name">Your name:</label>
                    <input type="text" id="name" name="name">
                    <input type="submit" value="Create">
                </form>
            </div>
        </div>
    </body>
</html>