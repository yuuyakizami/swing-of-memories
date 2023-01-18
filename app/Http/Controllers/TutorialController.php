<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
        return view('tutorial.index', ['tutorial' => Tutorial::all()]);
        // return view('tutorial.index', ['tutorial'=> Tutorial::orderBy('created_at', 'desc')->get()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tutorial $tutorial, User $user)
    {
        
        $validated = $request->validate([
            'title' => 'required|min:8|max:100',
            'video' => 'required|min:8|max:100',
            'title_description' => 'required|min:8|max:500',
        ]);

        // $tutorial->video = $request->input('video', 'Video');
        // $tutorial = new Tutorial();
        // $tutorial->title = $validated('title', 'Title');
        // $tutorial->video = $validated('video', 'Video');
        // $tutorial->title_description = $validated('title_description', 'Title Description');
        // $tutorial->save();

        $tutorial = Tutorial::create($validated);

        // Create a flash Message
        $request->session()->flash('status', 'Tutorial Created');


        return redirect()->route('tutorial.show', ['tutorial' => $tutorial->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('tutorial.show', ['tutorial'=>Tutorial::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        return view('tutorial.edit', ['tutorial'=>Tutorial::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tutorial = Tutorial::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|min:8|max:100',
            'video' => 'required|min:8|max:100',
            'title_description' => 'required|min:8|max:500',
        ]);
        $tutorial->fill($validated);
        $tutorial->save();

        $request->session()->flash('status', 'Tutorial Updated');

        return view('tutorial.update', ['tutorial'=>$tutorial->$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
