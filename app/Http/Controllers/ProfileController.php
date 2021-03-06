<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMyInfo()
    {
        return view('myInfo.index');
    }

    public function change_pass_form()
    {
        return view('myInfo.change-password');

    }

    public function update_my_pass(Request $request)
    {
        $valid = request()->validate([
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
            ],
        ]);
        auth()->user()->password = bcrypt($valid['password']);
        auth()->user()->save();
        return redirect('/myinfo');
    }

}
