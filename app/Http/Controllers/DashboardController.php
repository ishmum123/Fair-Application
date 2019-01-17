<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('guest');
    }
    public function dashboard(){
        return view('home.dashboard');
    }

    public function empty(){
        return view('home.welcome');
    }
}
