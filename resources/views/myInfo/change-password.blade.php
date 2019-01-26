@extends('layouts.master')
@section('content')

    <form id="demo-form2"  class="form-horizontal form-label-left"  method="post" action="/myinfo">
        <h2>Change Password</h2>
        @csrf
        @method('patch')
        {{--@method('patch')--}}

        {{--<span>{{ \Illuminate\Support\Facades\Auth::user()->getAuthPassword() }}</span>--}}

        {{--<div class="form-group">--}}
            {{--<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Old Password<span class="required">*</span></label>--}}
            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                {{--<input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="old_password" data-parsley-id="8197" required value="{{ old('password') }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>--}}
                {{--@if($errors->has('old_password'))--}}
                    {{--<small style="color: red;">{{ $errors->first('old_password') }}</small>--}}
                {{--@endif--}}
            {{--</div>--}}

        {{--</div>--}}

        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name2" class="form-control col-md-7 col-xs-12" type="password" name="password" data-parsley-id="8197" required value="{{ old('password') }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>
                @if($errors->has('password'))
                    <small style="color: red;">{{ $errors->first('password') }}</small>
                @endif
            </div>

        </div>

        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="password_confirmation" data-parsley-id="8197" required value="{{ old('password_confirmation') }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>

            </div>

        </div>


        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a role="button" href="/myinfo" type="submit" class="btn btn-primary">Cancel</a>
                <button type="submit" class="btn btn-success" name="change">Submit</button>
            </div>
        </div>

    </form>
@endsection
