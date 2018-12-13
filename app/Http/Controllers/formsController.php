<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function gen_form(){
        return view('form');
    }

    public function validate_form(){
        return view('validate-form');
    }

}
