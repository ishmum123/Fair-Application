@extends('layouts.master')
@section('content')

    <div class="panel panel-info" style="margin: 60px;">
        <div class="page-header" style="text-align: center"><h1>Admin Details</h1></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-6" style="text-align: right;" ><label for="name" >Name</label></div>
                    <div class="col-md-6"><p for="name">{{ $admin->name }}</p></div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-6" style="text-align: right;"><label for="name">Email</label></div>
                    <div class="col-md-6"><p for="name">{{ $admin->email }}</p></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div style="text-align: right;" class="col-md-6"><label for="name" >Role</label></div>
                    <div class="col-md-6"><p for="name">Admin</p></div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div style="text-align: right;" class="col-md-6"><label for="name" >Registered on</label></div>
                    <div class="col-md-6"><p for="name">{{ date('F d, Y', strtotime($admin->created_at) ) }}</p></div>
                </div>
                <div class="col-md-6">
                    <div style="text-align: right;" class="col-md-6"><label for="name">Updated on</label></div>
                    <div class="col-md-6"><p for="name">{{ $admin->created_at == $admin->updated_at ? 'Not Updated':date('F d, Y', strtotime($admin->created_at) ) }}</p></div>
                </div>
            </div>



        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-8"></div>

                <div class="col-md-4">
                    <a href="/admins" role="button" class="btn btn-info">Cancel</a>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>

    </div>

@endsection
