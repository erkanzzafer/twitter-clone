<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(CreateIdeaRequest $request)
    {

        $validated = $request->validated();

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

    public function update(UpdateIdeaRequest $request,Idea $idea)
    {
        //Gate için
        //$this->authorize('idea.update',$idea);

        $this->authorize('update', $idea);
        $validated = $request->validated();
        $idea->update($validated);
        return redirect()->back()->with('success', 'Güncelleme Başarılı!!');
    }
}
