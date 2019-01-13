<?php

namespace App\Http\Controllers;

use App\Http\Middleware\redirct;
use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkSuper');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $welcomes = Welcome::all();
        return view('welcome.index', compact('welcomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('welcome.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid_attributes = request()->validate([
            'image_title' => 'required',
            'image_location' => 'required|min:60',
            'status' => 'required',
            'image_text' => 'required|min:15|max:4096'
        ]);

        $welcome = new Welcome();
        $welcome->image_title = $valid_attributes['image_title'];
        $welcome->image_location = $request->file('image_location')->store('welcome_image_files');
        if($valid_attributes['status'] == 'active') $welcome->active = 1;
        else $welcome->active = 0;
        $welcome->image_text = $valid_attributes['image_text'];
        $welcome->save();

        return redirect('/welcomes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function show(Welcome $welcome)
    {
        return view('welcome.show', compact('welcome'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Welcome $welcome)
    {
        return view('welcome.edit', compact('welcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Welcome $welcome)
    {
        $valid_attributes = request()->validate([
            'image_title' => 'required',
            'status' => 'required',
            'image_text' => 'required|min:15',
            'image_location' => 'min:60|max:4096'
        ]);

        $welcome->image_title = $valid_attributes['image_title'];
        $welcome->image_text = $valid_attributes['image_text'];
        if($valid_attributes['status'] == 'active') $welcome->active = 1;
        else $welcome->active = 0;
        if($request->has('image_location')) $welcome->image_location = $request->file('image_location')->store('welcome_image_files');
        $welcome->update();
        return redirect('/welcomes/'.$welcome->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Welcome $welcome)
    {
        $welcome->delete();
        return redirect('/welcomes');
    }
}
