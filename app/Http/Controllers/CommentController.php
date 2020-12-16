<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// use App\Http\Resources\comment as commentResource;
use Illuminate\Support\Facades\Auth;
use App\comment;


class CommentController extends Controller
{
    // post comment
    public function store(Request $request)
    {
        $comment = $request->isMethod('put') ? comment::findOrFail($request->comment_id) : new comment;

        $comment->article_id = $request->input('article_id');
        $comment->user_id = $request->get('user_id');
        $comment->comment = $request->input('comment');
        dd($comment);
        if ($comment->save()) {
            // return new commentResource($comment);
        }

        return null;
    }
}
