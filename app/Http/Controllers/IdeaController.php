<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ], [
            'content.required' => 'Bu alan zorunludur',
            'content.min' => 'En az 5 karakter girilmelidir'
        ]);

        $validated['user_id'] = auth()->user()->id;

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Parodi oluşturuldu');
    }


    public function destroy(Idea $idea)
    {
        //Gate için kullanıldı
        //$this->authorize('idea.delete',$idea);

        //policy için
        $this->authorize('delete', $idea);

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Parodi Silindi!');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        //Gate için
        //$this->authorize('idea.edit',$user);

        //policy
        $this->authorize('update', $idea);

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        //Gate için
        //$this->authorize('idea.update',$idea);

        $this->authorize('update', $idea);


        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ], [
            'content.required' => 'Bu alan zorunludur',
            'content.min' => 'En az 5 karakter girilmelidir'
        ]);

        $idea->update($validated);
        return redirect()->back()->with('success', 'Güncelleme Başarılı!!');
    }
}
