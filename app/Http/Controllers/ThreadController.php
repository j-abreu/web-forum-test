<?php

namespace App\Http\Controllers;

use App\Models\Thread as ModelsThread;
use App\Models\Replies as ModelsReplies;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index() {
        $threads = ModelsThread::all();

        return view('home', ['threads' => $threads]);
    }

    public function create() {
        return view('create');
    }

    public function store() {
        $thread = new ModelsThread();

        $thread->user_name = request('name');
        $thread->title = request('title');
        $thread->description = request('description');
        $thread->num_replies = 0;

        $thread->save();

        return redirect('/threads')->with('message', 'Thread created!');
    }

    public function show($id) {
        $thread = ModelsThread::findOrFail($id);
        $replies = ModelsReplies::where('thread_id', $id)->get();
        
        $thereIsReplies = false;
        if ($replies->isNotEmpty()) {
            $thereIsReplies = true;
        }

        return view('show', ['thread' => $thread, 'thereIsReplies' => $thereIsReplies, 'replies' => $replies]);
    }

    public function delete($id) {
        $thread = ModelsThread::findOrFail($id);
        $thread->delete();

        $replies = ModelsReplies::where('thread_id', $id)->get();

        foreach($replies as $reply) {
            $reply->delete();
        }

        return redirect('/threads');
    }
}
