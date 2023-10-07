<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower -> followings()-> attach($user);
        return redirect()->route('idea.users.show',$user->id)->with('success','Taki Edildi');
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $follower -> followings()-> detach($user);
        return redirect()->route('idea.users.show',$user->id)->with('success','Taki Edildi');
    }


}
