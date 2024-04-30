<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id)
    {
        $image = Image::find($id);
        $comments = $image->comment()->get();

    return view('comments.index', compact('image', 'comments'));
    }

    public function post($id, Request $request)
    {
        $image = Image::find($id);

        $comments = new Comment([
            'comments' => $request->comments,
            'user_id' => auth()->user()->id,
            'image_id' => $image->id,
        ]);

        $comments->save();

        return redirect()->back()->with('success', 'Success Addedd Comments!');
    }
}
