@extends('layouts.master')
@section('content')


    <form id="demo-form2"  class="form-horizontal form-label-left"  method="post" action="/users">
        <h2>Create User</h2>
        @csrf
        {{--php calculation--}}
        @php
            $required_att = 'required';
        @endphp

        {{--Name--}}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="name"  class="form-control col-md-7 col-xs-12" data-parsley-id="8976" required value="{{ old('name') }}"><ul class="parsley-errors-list" id="parsley-id-8976"></ul>
                @if($errors->has('name'))
                    <small style="color: red;">{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>

        {{--Email--}}
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="email" id="middle-name" class="form-control col-md-7 col-xs-12" type="email" data-parsley-id="8197" required value="{{ old('email') }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>
                @if($errors->has('email'))
                    <small style="color: red;">{{ $errors->first('email') }}</small>
                @endif
            </div>
        </div>

        {{--Mobile Number--}}
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mobile Number
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" id="mob" name="applicant_mobile"  type="text" value="{{ old('applicant_mobile') }}">
                @if($errors->has('applicant_mobile'))
                    <small style="color: red;">{{ $errors->first('applicant_mobile') }}</small>
                @endif
                <small id="hint" style="color: red;"></small>
            </div>
        </div>

        {{--Telephone Number--}}
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telephone Number
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" id="tel" name="applicant_telephone" type="text" value="{{ old('applicant_telephone') }}">

                @if($errors->has('applicant_telephone'))
                    <small style="color: red;">{{ $errors->first('applicant_telephone') }}</small>
                @endif
            </div>
        </div>

        {{--Organization Name--}}
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Organization Name<span class="">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="applicant_name"  type="text" value="{{ old('applicant_name') }}">
                @if($errors->has('applicant_name'))
                    <small style="color: red;">{{ $errors->first('applicant_name') }}</small>
                @endif
            </div>
        </div>

        {{--Organization Address--}}
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Organization Address<span class="">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="applicant_address">{{ old('applicant_address') }}</textarea>
                @if($errors->has('applicant_address'))
                    <small style="color: red;">{{ $errors->first('applicant_address') }}</small>
                @endif
            </div>
        </div>

        {{--Password--}}
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="password" data-parsley-id="8197" required value="{{ old('password') }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>
                @if($errors->has('password'))
                    <small style="color: red;">{{ $errors->first('password') }}</small>
                @endif
            </div>
        </div>

        {{--Password Confirmation--}}
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="password_confirmation" data-parsley-id="8197" required value="{{ old('password_confirmation') }}"><ul class="parsley-errors-list" id="parsley-id-8197"></ul>
            </div>
        </div>

        {{--Status--}}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label id="active" class="btn btn-default">
                        <input type="radio" name="status" value="inactive"  > &nbsp; Inactive &nbsp;
                    </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                    <label id="inactive" class="btn btn-primary">
                        <input type="radio" name="status" value="active" checked> Active
                    </label>
                </div>
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>

    {{--Js for Active-Inactive button--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#active').click(function () {
                $('#active').removeClass("btn-default").addClass('btn-primary');
                $('#inactive').removeClass("btn-primary").addClass("btn-default");
            });

            $('#inactive').click(function () {
                $('#active').removeClass("btn-primary").addClass('btn-default');
                $('#inactive').removeClass("btn-default").addClass("btn-primary");
            });

        });
    </script>
@endsection
