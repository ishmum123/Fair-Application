<?php

namespace App\Http\Controllers;

use App\Mail\ApprovalMail;
use App\Mail\Confirmation;
use App\Mail\RejectionlMail;
use App\Models\Application;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Codedge\Fpdf\Fpdf\Fpdf;


class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('checkSuper', ['only' => ['update']]);
        $this->middleware('checkAdmin', ['only' => ['update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajax_call = 'all';
        return view('application.index', compact('ajax_call'));

    }


    public function approved(){

        $ajax_call = 'Approved';
        return view('application.index', compact('ajax_call'));
    }

    public function unapproved(){

        $ajax_call = 'Unapproved';
        return view('application.index', compact('ajax_call'));
    }

    public function rejected(){
        $ajax_call = 'Rejected';
        return view('application.index', compact('ajax_call'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if( Auth::user()->role != 'user' ){
            $applicants = User::all()->where('role','user');
        }
        else $applicants = [];

        $districts = District::all();

        return view('application.create',compact(['applicants','districts']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role == 'user'){
            $request['user'] = Auth::user()->id;
        }


        $img_max_size = 'max:2048'; //max image size 1 MB

        $valid = request()->validate([
            'user' => 'required|not_in:default',
            'district' => 'required|not_in:default',
            'festival_name' => 'required',
            'festival_type' => 'required',
            'from-to' => 'required',
            'festival_place' => 'required',
            'reg_no' => 'required',
            'tin_no' => 'required',
            'chaalan_no' => 'required',
            'date' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'tin_no_attach' => ['required','mimes:jpeg,jpg,png,gif,pdf',$img_max_size],
            'reg_no_attach' => ['required','mimes:jpeg,jpg,png,gif,pdf',$img_max_size],
            'festival_place_attach' => ['required','mimes:jpeg,jpg,png,gif,pdf',$img_max_size],
            'vat_reg_no_attach' => ['mimes:jpeg,jpg,png,gif,pdf',$img_max_size]


        ]);


        $from_date = str_before($request['from-to'],'-');
        $to_date = str_after($request['from-to'],'-');

        $from_date = date('Y-m-d',strtotime($from_date) );

        $to_date = date('Y-m-d',strtotime($to_date) );

        $valid['date'] = date('Y-m-d',strtotime($valid['date']) );

        $valid['festival_place_attach'] = $request->file('festival_place_attach')->store('applications_files');
        $valid['reg_no_attach'] = $request->file('reg_no_attach')->store('applications_files');
        $valid['tin_no_attach'] = $request->file('tin_no_attach')->store('applications_files');

        if($request->hasFile('vat_reg_no_attach') )
            $valid['vat_reg_no_attach'] = $request->file('vat_reg_no_attach')->store('applications_files');

//        Application::create($valid);

        $application = new Application();
        $application->user_id = $valid['user'];
        $application->district_id = $valid['district'];
        $application->festival_name = $valid['festival_name'];
        $application->festival_type = $valid['festival_type'];
        $application->from = $from_date;
        $application->to = $to_date;
        $application->festival_place = $valid['festival_place'];
        $application->festival_place_attach = $valid['festival_place_attach'];
        $application->reg_no = $valid['reg_no'];
        $application->reg_no_attach = $valid['reg_no_attach'];
        $application->tin_no = $valid['tin_no'];
        $application->tin_no_attach = $valid['tin_no_attach'];
        if($request->has('vat_reg_no'))
            $application->vat_reg_no = $request['vat_reg_no'];
        if($request->hasFile('vat_reg_no_attach'))
            $application->vat_reg_no_attach = $valid['vat_reg_no_attach'];
        $application->chaalan_no = $valid['chaalan_no'];
        $application->date = $valid['date'];
        $application->bank_name = $valid['bank_name'];
        $application->branch_name = $valid['branch_name'];
        $application->status = 'Unapproved';



        $application->save();

//        Confirmation mail to User
        $mail_receiver = DB::table('users')->where('id',$application->user_id)->first();
        Mail::to($mail_receiver->email)->send( new Confirmation() );

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
        $current_user = Auth::user();
        abort_if($current_user->role == 'admin' && $application->district_id != $current_user->district_id, 403);
        abort_if($current_user->role == 'user' && $application->user_id != $current_user->id, 403);
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
            $application->status = 'Approved';
            $application->save();

            $mail_receiver = DB::table('users')->where('id',$application->user_id)->first();
            Mail::to($mail_receiver->email)->send( new ApprovalMail( $request['email_body'], $request['email_attach']) );
        }
        if($request->has('reject')){

            $application->status = 'Rejected';
            $application->save();

            $mail_receiver = DB::table('users')->where('id',$application->user_id)->first();
            Mail::to($mail_receiver->email)->send( new RejectionlMail() );
        }

        return redirect('/applications');
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

    /**
     * Get a PDF Version of the Application Data
     *
     * @param  \App\Application  $application
     * @return void
     */
    public function getPdf(Application $application, Fpdf $fpdf) {
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(50, 25, $application->festival_name);
        $fpdf->Output();
        exit();
    }
}
