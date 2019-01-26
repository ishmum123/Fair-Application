<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

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

        $admins = User::where('role', 2)->get();
        return view('admin.index', compact('admins'));
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
            'password' => 'required|string|min:6|confirmed'

        ]);


        $temp = new User;
        $temp->district_id = $valid_attributes['district'];
        $temp->name = $valid_attributes['name'];
        $temp->email = $valid_attributes['email'];
        $temp->password = bcrypt($valid_attributes['password']);
        $temp->role = 2;
        if($request['status'] == 'active')
            $temp->is_active = 1;
        else $temp->is_active = 0;
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
            $admin->is_active = !$admin->is_active;
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
