@extends('layouts.master')
@section('content')


    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        <h2>User Details</h2>
        @csrf
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name"  class="form-control col-md-7 col-xs-12" data-parsley-id="8976" value="{{ $user->name }}" readonly><ul class="parsley-errors-list" id="parsley-id-8976"></ul>

            </div>

        </div>

        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="email" id="middle-name" readonly class="form-control col-md-7 col-xs-12" type="email" data-parsley-id="8197" value="{{ $user->email }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>

            </div>

        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input readonly id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="password" data-parsley-id="8197" value="{{ $user->password }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>
            </div>

        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                Created at {{ $user->created_at }}
            </div>
        </div>

    </form>
@endsection
