<?php

namespace App\Http\Controllers;

use App\Models\Application;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkSuper', ['only' => ['update']]);
        $this->middleware('checkAdmin', ['only' => ['update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role > 2) $applications = Application::all()->where('user_id',Auth::user()->id)->sortBy('status');
        else $applications = Application::all()->sortBy('status');


        return view('application.index', compact('applications'));
    }



    public function processed(){
        if(Auth::user()->role > 2) $applications = Application::all()->where( 'user_id', Auth::user()->id)
                                                                    ->where('status', 1);
        else $applications = Application::all()->where('status', 1);
        return view('application.process', compact('applications'));
    }

    public function unprocessed(){
        if(Auth::user()->role > 2) $applications = Application::all()->where( 'user_id', Auth::user()->id)
            ->where('status', 0);
        else $applications = Application::all()->where('status', 0);
        return view('application.unprocess', compact('applications'));
    }

    public function rejected(){
        if(Auth::user()->role > 2) $applications = Application::all()->where( 'user_id', Auth::user()->id)
            ->where('status', 2);
        else $applications = Application::all()->where('status', 2);
        return view('application.reject', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user()->role < 3 ){
            $applicants = User::all()->where('role',3);
        }
        else $applicants = [];
        return view('application.create1',compact('applicants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $valid = request()->validate([
            'festival_name' => 'required',
            'festival_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'festival_place' => 'required',
            'festival_place_attach' => 'mimes:jpeg,jpg,png,gif|required|size:2000',
            'applicant_name' => 'required',
            'applicant_address' => 'required',
            'applicant_telephone' => 'required_without:applicant_mobile',
            'applicant_mobile' => 'required_without:applicant_telephone',
            'applicant_email' => 'required|email',
            'reg_no' => 'required',
            'reg_no_attach' => 'mimes:jpeg,jpg,png,gif|required|size:2000',
            'tin_no' => 'required',
            'tin_no_attach' => 'mimes:jpeg,jpg,png,gif|required|size:2000',
            'vat_reg_no' => 'required',
            'vat_reg_no_attach' => 'mimes:jpeg,jpg,png,gif|required|size:2000',
            'chaalan_no' => 'required',
            'date' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'fee_type' => 'required'

        ]);

        $valid['from'] = date('Y-m-d',strtotime($valid['from']) );
        $valid['to'] = date('Y-m-d',strtotime($valid['to']) );
        $valid['date'] = date('Y-m-d',strtotime($valid['date']) );

        if($valid['fee_type'] == 'international_fee') $valid['fee_type'] = 1;
        else $valid['fee_type'] = 0;

        if($valid['festival_type'] == 'international') $valid['festival_type'] = 1;
        else $valid['festival_type'] = 0;

        $valid['festival_place_attach'] = $request->file('festival_place_attach')->store('applications_files');
        $valid['reg_no_attach'] = $request->file('reg_no_attach')->store('applications_files');
        $valid['tin_no_attach'] = $request->file('tin_no_attach')->store('applications_files');
        $valid['vat_reg_no_attach'] = $request->file('vat_reg_no_attach')->store('applications_files');



        $application = new Application();
        if($request->has('user')){
            $application->user_id = $request['user'];
        }
        else $application->user_id = Auth::user()->id;

        $application->festival_name = $valid['festival_name'];
        $application->festival_type = $valid['festival_type'];
        $application->from = $valid['from'];
        $application->to = $valid['to'];
        $application->festival_place = $valid['festival_place'];
        $application->festival_place_attach = $valid['festival_place_attach'];
        $application->applicant_name = $valid['applicant_name'];
        $application->applicant_address = $valid['applicant_address'];
        $application->applicant_telephone = $valid['applicant_telephone'];
        $application->applicant_mobile = $valid['applicant_mobile'];
        $application->applicant_email = $valid['applicant_email'];
        $application->reg_no = $valid['reg_no'];
        $application->reg_no_attach = $valid['reg_no_attach'];
        $application->tin_no = $valid['tin_no'];
        $application->tin_no_attach = $valid['tin_no_attach'];
        $application->vat_reg_no = $valid['vat_reg_no'];
        $application->vat_reg_no_attach = $valid['vat_reg_no_attach'];
        $application->chaalan_no = $valid['chaalan_no'];
        $application->date = $valid['date'];
        $application->bank_name = $valid['bank_name'];
        $application->branch_name = $valid['branch_name'];
        $application->fee_type = $valid['fee_type'];
        $application->status = 0;

        $application->save();

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
        return view('application.show', compact('application'));
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
            $application->status = 1;
            $application->save();
        }
        if($request->has('reject')){

            $application->status = 2;
            $application->save();
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
