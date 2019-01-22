<?php

namespace App\Http\Controllers;

use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $users = User::where('role', 3)->get();
        return view('user.index', compact('users'));
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
            'password' => 'required|string|min:6|confirmed'

        ]);


        $temp = new User;
        $temp->name = $valid_attributes['name'];
        $temp->email = $valid_attributes['email'];
        $temp->password = bcrypt($valid_attributes['password']);
        if($request['status'] == 'active')
            $temp->is_active = 1;
        else $temp->is_active = 0;
        $temp->role = 3;
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

    public function myview(){
        $user = Auth::user();
        return view('info.myview',compact('user'));
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

    public function changePassword(){
        return view('info.change-password');
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
            $user->is_active = !$user->is_active;
            $user->update();
            return back();
        }


    }

    public function update_pass(Request $request){
        $valid = request()->validate([
            'password' => 'required|string|min:6|confirmed'

        ]);
        Auth::user()->password = bcrypt($valid['password']);
        Auth::user()->update();
        return redirect('/myview');
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
