<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store (CreateCommentRequest $request,Idea $idea){

        $validated=$request->validated();
        $validated['user_id']=auth()->user()->id;
        $validated['idea_id'] = $idea->id;
        Comment::create($validated);


/*
        $comment=new Comment();
        $comment-> content = $request->content1;
        $comment->idea_id= $idea->id;*/
        return redirect()->back()->with('success','Yorum başarıyla kaydedildi!!');
    }
}
