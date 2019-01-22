@extends('layouts.master')
@section('content')
    <div class="panel panel-info" style="margin: 60px;">

        <div class="page-header" style="text-align: center"><h1>My Details</h1></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <label class="col-md-3" style="text-align: right" for="name" >Name</label>
                    <span class="col-md-2">--</span>
                    <span class="col-md-5">{{ $user->name }}</span>
                </div>
                <div class="col-md-12">

                    <label class="col-md-3" style="text-align: right" for="name" >Email</label>
                    <span class="col-md-2">--</span>
                    <span class="col-md-5">{{ $user->email }}</span>
                </div>

                @php
                    $district = \Illuminate\Support\Facades\DB::table('districts')->where('id',$user->district_id)->get();
                @endphp

                @if(\Illuminate\Support\Facades\Auth::user()->role == 2)
                    <div class="col-md-12">

                        <label class="col-md-3" style="text-align: right" for="name" >Admin of District</label>
                        <span class="col-md-2">--</span>

                        <span class="col-md-5">{{ $district[0]->name }}</span>
                    </div>
                @endif

                <div class="col-md-12">

                    <label class="col-md-3" style="text-align: right" for="name" >Registered on</label>
                    <span class="col-md-2">--</span>
                    <span class="col-md-5">{{ date('F d, Y', strtotime($user->created_at) ) }}</span>
                </div>



            </div>




        </div>
        <div class="panel-footer">
            <div class="row">
                    <div class="col-md-12 text-center">
                        <a role="button" class="btn btn-outline-dark" href="/change-password">Want to change your password ?</a>
                    </div>

                </div>

            </div>
        </div>


    </div>
@endsection
