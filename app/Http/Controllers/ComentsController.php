<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Discussion;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function create($discussionId)
    {
        $discussion = Discussion::findOrFail($discussionId);
        return view('challenge.create-comment', compact('discussion'));
    }

    public function store(Request $request, $discussionId)
    {
        $this->middleware('auth');

        $discussion = Discussion::findOrFail($discussionId);

        $request->validate([
            'content' => 'required|string',
        ]);

        $user = auth()->user();

        $comment = Comments::create([
            'content' => $request->input('content', ''),
            'user_id' => $user->id,
            'discussion_id' => $discussionId,
        ]);

        return redirect()->route('single', ['id' => $discussionId])->with('success', 'Comment created successfully.');
    }

    public function destroy(Comments $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }

    public function edit(Comments $comment)
    {
        return view('challenge.edit-comment', compact('comment'));
    }
    
    public function update(Request $request, Comments $comment)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment->update(['content' => $request->input('content')]);

        return redirect()->route('single', ['id' => $comment->discussion->id])
            ->with('success', 'Comment updated successfully.');
    }
}
