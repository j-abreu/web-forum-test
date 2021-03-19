<?php

namespace App\Http\Controllers;
use App\Models\Replies as ModelsReplies;
use App\Models\Thread as ModelsThread;

use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function create() {
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
}
