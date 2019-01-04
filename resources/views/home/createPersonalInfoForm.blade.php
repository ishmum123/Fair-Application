@extends('layouts.master')
@section('content')
<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="/infos" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="4387" name="name"><ul class="parsley-errors-list" id="parsley-id-4387"></ul>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Profile Pic <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="file"  name="upload" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="9827" ><ul class="parsley-errors-list" id="parsley-id-9827"></ul>
        </div>
      </div>
     
      <!-- <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="gender" value="male" data-parsley-multiple="gender" data-parsley-id="5579"> &nbsp; Male &nbsp;
            </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
            <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="gender" value="female" checked="" data-parsley-multiple="gender" data-parsley-id="5579"> Female
            </label>
          </div>
        </div>
      </div> -->
      <!-- <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" data-parsley-id="8285" name="date-of-birth"><ul class="parsley-errors-list" id="parsley-id-8285"></ul>
        </div>
      </div> -->
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="/PersonalInfolslw" type="submit" class="btn btn-primary">Cancel</a>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>

    </form>

    <form action="/sendmail" method="post">
          @csrf
          <label for="mail">Email</label>
          <input type="email" name="mail">
          <input type="text" name="text">
          <button type="submit">Send</button>
     </form>

@endsection
