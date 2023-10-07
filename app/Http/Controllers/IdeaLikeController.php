<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $follower = auth()->user();
        $follower->likes()->attach($idea);
        return redirect()->back()->with('success', 'Beğenildi');
    }

    public function unlike(Idea $idea){

        $follower = auth()->user();
       $follower -> likes()-> detach($idea);
        return redirect()->back()->with('success','Beğeni iptal edildi');
    }
}
