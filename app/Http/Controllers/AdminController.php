<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
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
        return view('admin.index');
    }


    public function getAdminsData()
    {
        $admins = \DB::table('users')->join('districts', 'users.district_id', '=', 'districts.id')
            ->select(['users.id','users.name as a', 'users.email', 'users.status', 'districts.name'])
            ->where('users.role','admin');

        return Datatables::of($admins)
            ->addColumn('action', function ($admin) {
                return '<a href="/admins/'.$admin->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('status', function ($user) {
                return $user->status == 'Active' ? '<span class="badge" style="width: 60px; color:white">Active</span>' : '<span style="width: 60px; color:darkgray" class="badge">Inactive</span>';
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

        return view('admin.create');
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
            'district' => 'required|not_in:default',
            'name' => 'required|string|max:255',
            'email' =>'required|string|max:255|email|unique:users',
            'applicant_telephone' => 'required_without:applicant_mobile',
            'applicant_mobile' => 'required_without:applicant_telephone',
            'password' => 'required|string|min:6|confirmed'

        ]);

        $spec = 'SPEC';

        $temp = new User;
        $temp->district_id = $valid_attributes['district'];
        $temp->name = $valid_attributes['name'];
        $temp->email = $valid_attributes['email'];
        $temp->organization_name = $spec;
        $temp->organization_address = $spec;
        if($valid_attributes['applicant_telephone'] != null)
            $temp->telephone_number = $valid_attributes['applicant_telephone'];
        if($valid_attributes['applicant_mobile'] != null)
            $temp->phone_number = $valid_attributes['applicant_mobile'];
        $temp->password = bcrypt($valid_attributes['password']);
        $temp->role = 'admin';
        if($request['status'] == 'active')
            $temp->status = 'Active';
        else $temp->status = 'Inactive';
        $temp->save();

        return redirect('/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return view('admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        if($request->has('changeStatus') ){
            if($admin->status == 'Active')
                $admin->status = 'Inactive';
            else $admin->status = 'Active';
            $admin->update();
            return redirect('/admins');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
