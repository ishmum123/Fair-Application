@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                    <form onsubmit="return validateForm()" name="myform"
                          class="form-horizontal form-label-left" method="post" action="/applications" enctype="multipart/form-data" >
                        @csrf

                        <span class="section">মেলা আয়োজনের অনুমোদনের জন্য অনলাইন আবেদন ফরম </span>

                        @if( Auth::user()->role < 3)
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="users">User <span class="required">*</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="user" required>
                                    <option value="default">Select One</option>
                                    @foreach($applicants as $applicant)
                                        <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                                    @endforeach
                                </select>
                                <span id="uu" style="color: red"></span>
                            </div>
                        </div>
                        @endif

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর নাম<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" type="text" name="festival_name" value="{{ old('festival_name') }}" >
                                @if($errors->has('festival_name'))
                                    <span style="color: red;">required</span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলার ধরণ<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="radio-inline"><input required type="radio" name="festival_type" value="national">দেশী</label>
                                <label class="radio-inline"><input type="radio" name="festival_type" value="international">আন্তর্জাতিক</label>
                                <div>@if($errors->has('festival_type'))
                                    <span style="color: red;">Select one of the two</span>
                                @endif </div>
                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর মেয়াদকাল <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group input-daterange">
                                    <input type="text" class="form-control"  id="from" name="from" value="{{ old('from') }}">
                                    <div class="input-group-addon">to</div>
                                    <input type="text" class="form-control"  id="to" name="to" value="{{ old('to') }}">

                                </div>
                                @if($errors->has('from') || $errors->has('to'))
                                    <span style="color: red;">Select start and end Date</span>
                                @endif

                            </div>
                        </div>


                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর স্থান<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="festival_place" type="text" value="{{ old('festival_place') }}">
                                @if($errors->has('festival_place'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">স্থান বরাদ্দপত্র সংযুক্ত করতে হবে<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="file" name="festival_place_attach" value="{{ old('festival_place_attach') }}">
                                @if($errors->has('festival_place_attach'))
                                    <span style="color: red;">Select an valid image formate</span>
                                @endif
                            </div>

                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">আবেদনকারী প্রতিষ্ঠান/সংগঠনের নাম<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="applicant_name"  type="text" value="{{ old('applicant_name') }}">
                                @if($errors->has('applicant_name'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">প্রতিষ্ঠান/সংগঠনের  ঠিকানা<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="applicant_address">{{ old('applicant_address') }}</textarea>
                                @if($errors->has('applicant_address'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">টেলিফোন নম্বর
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" id="tel" name="applicant_telephone" type="text" value="{{ old('applicant_telephone') }}">

                                @if($errors->has('applicant_telephone'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মোবাইল নম্বর
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" id="mob" name="applicant_mobile"  type="text" value="{{ old('applicant_mobile') }}">
                                @if($errors->has('applicant_mobile'))
                                    <span style="color: red;">Required</span>
                                @endif
                                <span id="hint" style="color: red;"></span>
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ইমেইল<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required  class="form-control col-md-7 col-xs-12" name="applicant_email" type="email" value="{{ old('applicant_email') }}">
                                @if($errors->has('applicant_email'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">কোম্পানি রেজি:নম্বর/ট্রেড লাইসেন্স<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="reg_no" type="text" value="{{ old('reg_no') }}">
                                @if($errors->has('reg_no'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত করতে হবে<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="file" name="reg_no_attach" value="{{ old('reg_no_attach') }}">
                                @if($errors->has('reg_no_attach'))
                                    <span style="color: red;">Select an valid image Formate</span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">টিন সার্টিফিকেট ও আয়কর সার্টিফিকেট<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tin_no" type="text" value="{{ old('tin_no') }}">
                                @if($errors->has('tin_no'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত করতে হবে<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="file" name="tin_no_attach" value="{{ old('tin_no_attach') }}">
                                @if($errors->has('tin_no_attach'))
                                    <span style="color: red;">Select an valid image Formate</span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ভ্যাট রেজি:নম্বর<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="vat_reg_no" type="text" value="{{ old('vat_reg_no') }}">
                                @if($errors->has('vat_reg_no'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত করতে হবে<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="file" name="vat_reg_no_attach" value="{{ old('vat_reg_no_attach') }}">
                                @if($errors->has('vat_reg_no_attach'))
                                    <span style="color: red;">Select an valid image Formate</span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">চালান নম্বর<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="text" name="chaalan_no" value="{{ old('chaalan_no') }}">
                                <div>@if($errors->has('chaalan_no'))
                                        <span style="color: red;">Required</span>
                                    @endif</div>
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">তারিখ<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <input required class="form-control" name="date" id="date" value="{{ old('date') }}">
                                @if($errors->has('date'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ব্যাংকের নাম<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="text" name="bank_name" class="form-control col-md-7 col-xs-12" value="{{ old('bank_name') }}">
                                @if($errors->has('bank_name'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">শাখার নাম<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="text" name="branch_name" class="form-control col-md-7 col-xs-12" value="{{ old('branch_name') }}">
                                @if($errors->has('branch_name'))
                                    <span style="color: red;">Required</span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">চালান ( কোড নং-১১৭০১০০০১২৬৮১) জমাকৃত টাকার পরিমাণ<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label><input required type="radio" name="fee_type" value="national_fee">স্থানীয় মেলা আয়োজনের ফি ৫০০০/- (পাঁচ হাজার) টাকা</label>
                                <label><input type="radio" name="fee_type" value="international_fee">আন্তর্জাতিক মেলা আয়োজনের ফি ২০০ মার্কিন ডলারের  সমপরিমাণ টাকা </label>
                                <div>@if($errors->has('fee_type'))
                                        <span style="color: red;">Select one of the two</span>
                                    @endif</div>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection