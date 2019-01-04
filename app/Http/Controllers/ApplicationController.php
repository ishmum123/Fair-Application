<?php

namespace App\Http\Controllers;

use App\Models\Application;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role > 2) $applications = Application::all()->where('user_id',Auth::user()->id);
        else $applications = Application::all();

        return view('application.index', compact('applications'));
    }



    public function processed(){
        if(Auth::user()->role > 2) $applications = Application::all()->where( 'user_id', Auth::user()->id)
                                                                    ->where('status', 1);
        else $applications = Application::all()->where('status', 1);
        return view('application.index', compact('applications'));
    }

    public function unprocessed(){
        if(Auth::user()->role > 2) $applications = Application::all()->where( 'user_id', Auth::user()->id)
            ->where('status', 0);
        else $applications = Application::all()->where('status', 0);
        return view('application.index', compact('applications'));
    }

    public function rejected(){
        if(Auth::user()->role > 2) $applications = Application::all()->where( 'user_id', Auth::user()->id)
            ->where('status', 2);
        else $applications = Application::all()->where('status', 2);
        return view('application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user()->role < 3 ){
            $applicants = User::all();
        }
        else $applicants = [];
        return view('application.create',compact('applicants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('attachment')){
            $path = $request->file('attachment')->store('new2');

        }
        else $path = '';


        $temp = new Application();
        if($request->has('user')){
            $temp->user_id = $request['user'];
        }
        else $temp->user_id = Auth::user()->id;

        $temp->title = $request['title'];
        $temp->body = $request['body'];
        $temp->attachment = $path;
        $temp->status = 0;
        $temp->save();

        return redirect('/applications');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return "I am here";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {

        if($request->has('process')){
            $application->update(['status'=>1]);
        }
        if($request->has('reject')){
            $application->update(['status'=>2]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
