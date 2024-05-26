<?php

// app/Http/Controllers/DiscussionController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DiscussionController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('challenge.disccusion', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('public/images/discussion_images');

        Discussion::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'description' => $request->input('description'),
            'user_id' => auth()->id(),
            'category_id' => $request->input('category_id'),
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Discussion created successfully, please wait until admin approves it.');
    }

    public function update(Request $request, $id)
    {
        $discussion = Discussion::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $discussion->title = $request->input('title');
        $discussion->description = $request->input('description');
        $discussion->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            if ($discussion->image) {
                Storage::delete('public/images/discussion_images/' . $discussion->image);
            }

            $imagePath = $request->file('image')->store('public/images/discussion_images');
            $discussion->image = basename($imagePath);
        }

        $discussion->save();

        return redirect()->route('home', ['id' => $id])->with('success', 'Discussion updated successfully.');
    }


    public function approved()
    {
        $discussions = Discussion::all();

        return view('challenge.approve-page', compact('discussions'));
    }
    public function single($id)
    {
        $discussion = Discussion::with('comments')->find($id);

        if (!$discussion) {
            abort(404);
        }

        return view('challenge.single', compact('discussion'));
    }

    public function approve($id)
    {
        $discussion = Discussion::findOrFail($id);
        $discussion->update(['status' => 'approved']);

        return redirect()->route('home')->with('success', 'Discussion approved successfully.');
    }
    public function denied($id)
    {
        $discussion = Discussion::findOrFail($id);
        $discussion->update(['status' => 'denied']);

        return redirect()->route('dashboard')->with('success', 'Discussion has been denied successfully.');
    }

    public function edit($id)
    {
        $discussion = Discussion::findOrFail($id);

        if (auth()->user()->id !== $discussion->user_id && !Auth::user()->role == 'admin') {
            abort(403, 'Unauthorized action.');
        }
        $discussion = Discussion::findOrFail($id);
        $categories = Category::all();

        return view('challenge.disccusion-update', compact('discussion', 'categories'));
    }
}
