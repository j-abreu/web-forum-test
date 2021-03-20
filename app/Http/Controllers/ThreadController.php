<?php

namespace App\Http\Controllers;

use App\Models\Thread as ModelsThread;
use App\Models\Replies as ModelsReplies;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index() {
        $threads = ModelsThread::orderBy('created_at', 'desc')->simplePaginate(20);

        return view('home', ['threads' => $threads]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $r) {
        $r->validate([
            'name' => 'required | max:250',
            'title' => 'required | max:250',
            'description' => 'required | max:65000'
        ]);


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
        $replies = ModelsReplies::where('thread_id', $id)->orderBy('created_at', 'desc')->simplePaginate(20);
        
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

    public function edit($id) {
        $thread = ModelsThread::findOrFail($id);

        return view('edit_thread', ['thread' => $thread]);
    }

    public function update(Request $r, $id) {
        $r->validate([
            'title' => 'required | max:250',
            'description' => 'required | max:65000',
            'name' => 'required | max:250'
        ]);
        
        $thread = ModelsThread::findOrFail($id);

        $thread->title = request('title');
        $thread->description = request('description');
        $thread->user_name = request('name');

        $thread->save();

        return redirect('/threads');

    }
}
