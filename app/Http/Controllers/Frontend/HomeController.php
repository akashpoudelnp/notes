<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $notes= auth()->user()->notes;

        return view('home.index',compact('notes'));
    }
    public function create()
    {

        return view('home.create');
    }
    public function storenote(Request $request)
    {

      $data= $request->validate([
          'name'=>['required','string'],
          'description'=>['required','string'],
          'user_id'=> ['exists:users,id','required']
      ]);

      Note::create($data);

      return redirect()->route('home')->with('success','Note Created Suceessfully');

    }
    public function edit(Note $note)
    {


      if ($note->user_id != auth()->user()->id)
      abort(404);

      return view('home.edit',compact('note'));

    }

    public function update(Request $request, Note $note)
    {

        $data= $request->validate([
            'name'=>['required','string'],
            'description'=>['required','string'],
        ]);

        $note->update($data);

      return redirect()->route('home')->with('success','Note Update Suceessfully');

    }

    public function delete(Note $note)
    {
        if ($note->user_id != auth()->user()->id)
        abort(404);

        $note->delete();

        return redirect()->route('home')->with('success','Note Deleted Suceessfully');
    }
}
