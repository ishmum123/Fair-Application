@extends('layouts.master')
@section('content')

    <div class="panel panel-info" style="margin: 60px;">
        <div class="page-header" style="text-align: center"><h1>Admin Details</h1></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <label class="col-md-3" style="text-align: right" for="name" >District</label>
                    <span class="col-md-2">--</span>
                    @php
                        $district = \Illuminate\Support\Facades\DB::table('districts')->where('id',$admin->district_id)->get();
                    @endphp
                    <span class="col-md-5">{{ $district[0]->name }}</span>
                </div>
                <div class="col-md-12">

                    <label class="col-md-3" style="text-align: right" for="name" >Name</label>
                    <span class="col-md-2">--</span>
                    <span class="col-md-5">{{ $admin->name }}</span>
                </div>
                <div class="col-md-12">

                    <label class="col-md-3" style="text-align: right" for="name" >Email</label>
                    <span class="col-md-2">--</span>
                    <span class="col-md-5">{{ $admin->email }}</span>
                </div>

                <div class="col-md-12">

                    <label class="col-md-3" style="text-align: right" for="name" >Registered on</label>
                    <span class="col-md-2">--</span>
                    <span class="col-md-5">{{ date('F d, Y', strtotime($admin->created_at) ) }}</span>
                </div>



            </div>




        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="col-md-3" style="text-align: right" for="name" >Status</h4>
                    <h4 class="col-md-2">--</h4>
                    <div class="col-md-5">
                        <div class="col-md-3"><h4 style="color: {{ $admin->is_active ? 'green':'red' }}">{{ $admin->is_active ? 'Active':'Inactive' }}</h4></div>
                        <div class="col-md-2">
                        <form class="form-inline" action="/users/{{ $admin->id }}" method="post">
                            @csrf
                            @method('patch')
                            <button  class="{{ $admin->is_active ? 'btn btn-danger':'btn btn-primary' }}" type="submit" name="changeStatus">Click To {{ $admin->is_active ? 'Inactive':'Active' }}</button>
                        </form></div>

                    </div>

                </div>

            </div>
        </div>


    </div>

@endsection
