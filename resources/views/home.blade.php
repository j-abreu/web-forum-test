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
            <div class="title m-b-md">
                Web Forum
            </div>

            <h1>Threads</h1>

            <div class="top-right create-button">
                <a href="/threads/create">Create a new Thread</a>
            </div>

            <p class="message">{{ session('message') }}</p>

            @foreach($threads as $thread)
                <div>
                    <fieldset>
                        <h2>{{$thread['title']}}</h2>
                        <h3>
                            {{$thread['num_replies']}}
                            @if ($thread['num_replies'] == 1)
                                Reply
                            @else
                                Replies
                            @endif
                        </h3>
                        <a href="/threads/{{$thread->id}}">DETAILS</a>
                        <br><br>
                        <form action="/threads/{{$thread->id}}" method="POST">
                            @csrf
                            <button>Delete this Thread</button>
                        </form>
                    </fieldset>
                    <p></p>
                </div>
            @endforeach

        </div>
    </body>
</html>