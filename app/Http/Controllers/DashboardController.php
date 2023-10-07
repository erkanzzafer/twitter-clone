<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

       /* $idea = new Idea();
        $idea->content = "test";
        $idea->likes = 1;
        $idea->save();*/

      /*  $idea=Idea::create([
            'content' => 'test_create',
            'likes' => 101
        ]);
        $idea->save();*/

        if(request()->has('search')){
            // %search%
            $ideas=Idea::where('content','like', '%'.request()->search.'%')->paginate(3);
        }else{
            $ideas=Idea::orderBy('created_at','DESC')->paginate(3);
        }


        return view('dashboard',compact('ideas'));
    }

}
