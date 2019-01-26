<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Middleware\redirct;
use App\Mail\confirmation;
use App\Models\Application;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $identity = 'all';
        $applications = Application::all();
        $current_user = Auth::user();
        $current_user_role = Auth::user()->role;

        if($current_user_role == 1){

            $div_dis_ins = DB::table('districts')->select('id')->where('isDivision',1)->get();
            $divisional_districts = [];
            $index = 0;
            foreach ($div_dis_ins as $dis){
                $divisional_districts[$index++] = $dis->id;
            }

            $divisional_applications = $applications->whereIn('district_id', $divisional_districts )->sortByDesc('created_at');
            $non_divisional_applications = $applications->whereNotIn('district_id', $divisional_districts )->sortByDesc('created_at');

            return view('application.index', compact(['divisional_applications','non_divisional_applications','identity']));
        }

        elseif($current_user_role == 2){
            $applications = $applications->where('district_id', $current_user->district_id)->sortByDesc('created_at');;
            return view('application.index', compact(['applications','identity']));
        }

        else{
            $applications = $applications->where('user_id', $current_user->id)->sortByDesc('created_at');
            return view('application.index', compact(['applications','identity']));
        }


    }



    public function approved(){
        $identity = 'approved';
        $applications = Application::all();
        $current_user = Auth::user();
        $current_user_role = Auth::user()->role;

        if($current_user_role == 1){

            $div_dis_ins = DB::table('districts')->select('id')->where('isDivision',1)->get();
            $divisional_districts = [];
            $index = 0;
            foreach ($div_dis_ins as $dis){
                $divisional_districts[$index++] = $dis->id;
            }

            $divisional_applications = $applications->whereIn('district_id', $divisional_districts )->where('status',1)->sortByDesc('created_at');
            $non_divisional_applications = $applications->whereNotIn('district_id', $divisional_districts )->where('status',1)->sortByDesc('created_at');

            return view('application.index', compact(['divisional_applications','non_divisional_applications','identity']));
        }

        elseif($current_user_role == 2){
            $applications = $applications->where('district_id', $current_user->district_id)->where('status',1)->sortByDesc('created_at');;
            return view('application.index', compact(['applications','identity']));
        }

        else{
            $applications = $applications->where('user_id', $current_user->id)->where('status',1)->sortByDesc('created_at');
            return view('application.index', compact(['applications','identity']));
        }
    }

    public function unapproved(){
        $identity = 'unapproved';
        $applications = Application::all();
        $current_user = Auth::user();
        $current_user_role = Auth::user()->role;

        if($current_user_role == 1){

            $div_dis_ins = DB::table('districts')->select('id')->where('isDivision',1)->get();
            $divisional_districts = [];
            $index = 0;
            foreach ($div_dis_ins as $dis){
                $divisional_districts[$index++] = $dis->id;
            }

            $divisional_applications = $applications->whereIn('district_id', $divisional_districts )->where('status',0)->sortByDesc('created_at');
            $non_divisional_applications = $applications->whereNotIn('district_id', $divisional_districts )->where('status',0)->sortByDesc('created_at');

            return view('application.index', compact(['divisional_applications','non_divisional_applications','identity']));
        }

        elseif($current_user_role == 2){
            $applications = $applications->where('district_id', $current_user->district_id)->where('status',0)->sortByDesc('created_at');;
            return view('application.index', compact(['applications','identity']));
        }

        else{
            $applications = $applications->where('user_id', $current_user->id)->where('status',0)->sortByDesc('created_at');
            return view('application.index', compact(['applications','identity']));
        }
    }

    public function rejected(){
        $identity = 'rejected';
        $applications = Application::all();
        $current_user = Auth::user();
        $current_user_role = Auth::user()->role;

        if($current_user_role == 1){

            $div_dis_ins = DB::table('districts')->select('id')->where('isDivision',1)->get();
            $divisional_districts = [];
            $index = 0;
            foreach ($div_dis_ins as $dis){
                $divisional_districts[$index++] = $dis->id;
            }

            $divisional_applications = $applications->whereIn('district_id', $divisional_districts )->where('status',2)->sortByDesc('created_at');
            $non_divisional_applications = $applications->whereNotIn('district_id', $divisional_districts )->where('status',2)->sortByDesc('created_at');

            return view('application.index', compact(['divisional_applications','non_divisional_applications','identity']));
        }

        elseif($current_user_role == 2){
            $applications = $applications->where('district_id', $current_user->district_id)->where('status',2)->sortByDesc('created_at');;
            return view('application.index', compact(['applications','identity']));
        }

        else{
            $applications = $applications->where('user_id', $current_user->id)->where('status',2)->sortByDesc('created_at');
            return view('application.index', compact(['applications','identity']));
        }
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
        if(Auth::user()->role == 3){
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
            'applicant_name' => 'required',
            'applicant_address' => 'required',
            'applicant_telephone' => 'required_without:applicant_mobile',
            'applicant_mobile' => 'required_without:applicant_telephone',
            'applicant_email' => 'required|email',
            'reg_no' => 'required',
            'tin_no' => 'required',
            'chaalan_no' => 'required',
            'date' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'fee_type' => 'required',
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


        if($valid['fee_type'] == 'international_fee') $valid['fee_type'] = 1;
        else $valid['fee_type'] = 0;

        if($valid['festival_type'] == 'international') $valid['festival_type'] = 1;
        else $valid['festival_type'] = 0;

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
        $application->applicant_name = $valid['applicant_name'];
        $application->applicant_address = $valid['applicant_address'];
        $application->applicant_telephone = $valid['applicant_telephone'];
        $application->applicant_mobile = $valid['applicant_mobile'];
        $application->applicant_email = $valid['applicant_email'];
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
        $application->fee_type = $valid['fee_type'];
        $application->status = 0;

        $application->save();

//        Confirmation mail to User
        $mail_receiver = DB::table('users')->where('id',$application->user_id)->first();
        Mail::to($mail_receiver->email)->send( new confirmation() );

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
        abort_if($current_user->role == 2 && $application->district_id != $current_user->district_id, 403);
        abort_if($current_user->role == 3 && $application->user_id != $current_user->id, 403);
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
}
