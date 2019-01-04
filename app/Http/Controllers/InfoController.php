<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Auth;
use App\Mail\confirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp = Info::all();
        //return $temp;
        return view('home.show_all', compact('temp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.createPersonalInfoForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('upload') ) return "yes";
        return $request->file('upload')->store('public/mno');
        $temp = new Info();
        $temp->name = $request['name'];
        $image_name = $request->file('profile');

        $image_name = $image_name->getClientOriginalName();
        Storage::putFileAs(
            'public/infos', $request->file('profile'), $image_name
        );

        $temp->pic_name = $image_name;
        $temp->save();
        
        \Mail::to(Auth::user()->email)->send(new confirmation());
        return redirect('/infos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        $image = $info->pic_name;
        $url = Storage::url('public/infos/'.$image);
        $temp = new Info();
        $temp->name = $info->name;
        $temp->pic_name = $url;
        return view('show', compact('temp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        //
    }
}
