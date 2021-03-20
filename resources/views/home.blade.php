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

            <div class="top-right button1">
                <a href="/threads/create">Create a new Thread</a>
            </div>

            <p class="message">{{ session('message') }}</p>

            @foreach($threads as $thread)
                <div class="thread">
                    <fieldset>
                        <h2>{{$thread['title']}}</h2>
                        <h4>
                            {{$thread['num_replies']}}
                            @if ($thread['num_replies'] == 1)
                                Reply
                            @else
                                Replies
                            @endif
                        </h4>
                        <div class="button2"><a href="/threads/{{$thread->id}}">DETAILS</a></div>  
                        <br>
                        <form action="/threads/{{$thread->id}}" method="POST">
                            @csrf
                            <button>Delete this Thread</button>
                        </form>
                    </fieldset>
                    <p></p>
                </div>
            @endforeach

        </div>
        <br><br>
    </body>
</html>
