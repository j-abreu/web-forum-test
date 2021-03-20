<?php

namespace App\Http\Controllers;
use App\Models\Replies as ModelsReplies;
use App\Models\Thread as ModelsThread;

use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function create(Request $r) {

        $r->validate([
            'reply' => 'required | max:65000',
            'name' => 'required | max:250'
        ]);

        $reply = new ModelsReplies();

        $reply->thread_id = request('threadid');
        $reply->reply_text = request('reply');
        $reply->user_name = request('name');

        $reply->save();

        $thread = ModelsThread::where('id', request('threadid'))->get();

        if ($thread->isNotEmpty()) {
            $thread[0]->num_replies += 1;
            $thread[0]->save();
        }

        return redirect('/threads/'. $reply->thread_id);
    }

    public function delete($id) {
        $reply = ModelsReplies::findOrFail($id);
        
        $reply->delete();

        $thread = ModelsThread::findOrFail($reply->thread_id);
        $thread->num_replies -= 1;
        $thread->save();

        return redirect('/threads/'.$reply->thread_id);
    }

    public function edit($id) {
        $reply = ModelsReplies::findOrFail($id);
        return view('edit_reply', ['reply' => $reply]);
    }

    public function update(Request $r, $id) {

        $r->validate([
            'name' => 'required | max:250',
            'reply' => 'required | max:65000'
        ]);

        $reply = ModelsReplies::findOrFail($id);
        $reply->user_name = request('name');
        $reply->reply_text = request('reply');

        $reply->save();

        return redirect('/threads/' .$reply->thread_id);
    }
}
