<?php

namespace App\Http\Controllers;

use App\Http\Middleware\redirct;
use Carbon\Carbon;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin')->except(['myview','changePassword','update_pass']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function getUsersData(){
        $users = DB::table('users')->select('id','name','email','organization_name','phone_number','status','users.created_at')
            ->where('role','user');

        return Datatables::of($users)
            ->addColumn('action', function ($users) {
                return '<a href="/users/'.$users->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('status', function ($user) {
                return $user->status == 'Active' ? '<span class="badge" style="width: 60px; color:white">Active</span>' : '<span style="width: 60px; color:darkgray" class="badge">Inactive</span>';
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => 'required|string|max:255',
            'email' =>'required|string|max:255|email|unique:users',
            'applicant_name' => 'required',
            'applicant_address' => 'required',
            'applicant_telephone' => 'required_without:applicant_mobile',
            'applicant_mobile' => 'required_without:applicant_telephone',
            'password' => 'required|string|min:6|confirmed',

        ]);


        $temp = new User;
        $temp->name = $valid_attributes['name'];
        $temp->email = $valid_attributes['email'];
        $temp->organization_name = $valid_attributes['applicant_name'];
        $temp->organization_address = $valid_attributes['applicant_address'];
        if($valid_attributes['applicant_telephone'] != null)
           $temp->telephone_number = $valid_attributes['applicant_telephone'];
        if($valid_attributes['applicant_mobile'] != null)
            $temp->phone_number = $valid_attributes['applicant_mobile'];
        $temp->password = bcrypt($valid_attributes['password']);
        if($request['status'] == 'active')
            $temp->status = 'Active';
        else $temp->status = 'Inactive';
        $temp->role = 'user';
        $temp->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
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
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if($request->has('changeStatus') ){
            if($user->status == 'Active')
                $user->status = 'Inactive';
            else $user->status = 'Active';
            $user->update();
            return redirect('/users');
        }


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
