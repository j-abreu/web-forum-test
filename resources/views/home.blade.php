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
                <a href="/threads/create" style="text-decoration:none">Create a new Thread</a>
            </div>

            <p class="message">{{ session('message') }}</p>

            @foreach($threads as $thread)
                <div class="thread">
                    <fieldset>
                        <h2>{{$thread['title']}}</h2>
                        <h4>
                            @if ($thread['num_replies'] == 0)
                                {{$thread['num_replies']}} Replies
                            @elseif ($thread['num_replies'] == 1)
                                <a href="/replies/{{$thread->id}}" style="text-decoration:none">{{$thread['num_replies']}} Reply</a>
                            @else
                                <a href="/replies/{{$thread->id}}" style="text-decoration:none">{{$thread['num_replies']}} Replies</a>
                            @endif
                        </h4>
                        <div class="button2"><a href="/threads/{{$thread->id}}" style="text-decoration:none">DETAILS</a></div>  
                        <br>
                        <div class="row">
                            <div class="column">
                                <form action="/threads/edit/{{$thread->id}}" method="GET">
                                    @csrf
                                    <button>Edit this Thread</button>
                                </form>
                            </div>
                            <div class="column">
                                <form action="/threads/{{$thread->id}}" method="POST">
                                    @csrf
                                    <button>Delete this Thread</button>
                                </form>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                </div>
            @endforeach
            
            {{$threads->links()}}
        </div>
        
        <br><br>
    </body>
</html>
