@extends('layouts.master')



@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                    <form onsubmit="return validateForm()" name="myform"
                          class="form-horizontal form-label-left" method="post" action="/applications" enctype="multipart/form-data" >
                        @csrf
                        @php
                            $required_att = 'required';
                        @endphp
                        <span class="section">মেলা আয়োজনের অনুমোদনের জন্য অনলাইন আবেদন ফরম </span>

                        @if( Auth::user()->role < 3)
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="users">আবেদনকারী <span class="">*</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="user">

                                        <option value="default">Select One</option>
                                        @foreach($applicants as $applicant)
                                            @if($applicant->id == old('user'))
                                                <option selected value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                                                @else
                                                <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <span id="uu" style="color: red"></span>
                                    @if($errors->has('user'))
                                        <small style="color: red;">{{ $errors->first('user') }}</small>
                                    @endif
                                </div>

                            </div>
                        @endif

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="users">জেলা<span class="">*</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12 mdb-select md-form" name="district">

                                    <option value="default">Select District</option>
                                    @foreach($districts as $district)
                                        @if($district->id == old('district'))
                                            <option selected value="{{ $district->id }}">{{ $district->name }}</option>
                                            @else
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endif
                                    @endforeach

                                </select>
                                <span id="uu" style="color: red"></span>
                                @if($errors->has('district'))
                                    <small style="color: red;">{{ $errors->first('district') }}</small>
                                @endif
                            </div>

                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর নাম<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" type="text" name="festival_name" value="{{ old('festival_name') }}" >
                                @if($errors->has('festival_name'))
                                    <small style="color: red;">{{ $errors->first('festival_name') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলার ধরণ<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="radio-inline"><input {{ $required_att }}  type="radio" name="festival_type" value="national">দেশী</label>
                                <label class="radio-inline"><input type="radio" name="festival_type" value="international">আন্তর্জাতিক</label>
                                <div>@if($errors->has('festival_type'))
                                        <small style="color: red;">{{ $errors->first('festival_type') }}</small>
                                    @endif </div>
                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর মেয়াদকাল <span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @php
                                    $date_range = date('F d, Y').' - '.date('F d, Y', strtotime("+3 week"));
                                @endphp


                                <input {{ $required_att }} placeholder="Select Duration" class="form-control col-md-7 col-xs-12" id="reportrange_right" name="from-to" value="{{ old('from-to')? old('from-to'):'' }}" autocomplete="off">
                                @if($errors->has('from-to'))
                                    <small style="color: red;">{{ $errors->first('from-to') }}</small>
                                @endif
                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর স্থান<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="festival_place" type="text" value="{{ old('festival_place') }}">
                                @if($errors->has('festival_place'))
                                    <small style="color: red;">{{ $errors->first('festival_place') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">স্থান বরাদ্দপত্র সংযুক্ত করতে হবে<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} type="file" name="festival_place_attach" value="{{ old('festival_place_attach') }}">
                                @if($errors->has('festival_place_attach'))
                                    @foreach ($errors->get('festival_place_attach') as $error)
                                        <small style="color: red;">{{ $error}}</small>
                                    @endforeach
                                @endif
                            </div>


                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">আবেদনকারী প্রতিষ্ঠান/সংগঠনের নাম<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="applicant_name"  type="text" value="{{ old('applicant_name') }}">
                                @if($errors->has('applicant_name'))
                                    <small style="color: red;">{{ $errors->first('applicant_name') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">প্রতিষ্ঠান/সংগঠনের  ঠিকানা<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="applicant_address">{{ old('applicant_address') }}</textarea>
                                @if($errors->has('applicant_address'))
                                    <small style="color: red;">{{ $errors->first('applicant_address') }}</small>
                                @endif
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">টেলিফোন নম্বর
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" id="tel" name="applicant_telephone" type="text" value="{{ old('applicant_telephone') }}">

                                @if($errors->has('applicant_telephone'))
                                    <small style="color: red;">{{ $errors->first('applicant_telephone') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মোবাইল নম্বর
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" id="mob" name="applicant_mobile"  type="text" value="{{ old('applicant_mobile') }}">
                                @if($errors->has('applicant_mobile'))
                                    <small style="color: red;">{{ $errors->first('applicant_mobile') }}</small>
                                @endif
                                <small id="hint" style="color: red;"></small>
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ইমেইল<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }}  class="form-control col-md-7 col-xs-12" name="applicant_email" type="email" value="{{ old('applicant_email') }}">
                                @if($errors->has('applicant_email'))
                                    <small style="color: red;">{{ $errors->first('applicant_email') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">কোম্পানি রেজি:নম্বর/ট্রেড লাইসেন্স<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="reg_no" type="text" value="{{ old('reg_no') }}">
                                @if($errors->has('reg_no'))
                                    <small style="color: red;">{{ $errors->first('reg_no') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত করতে হবে<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} type="file" name="reg_no_attach" value="{{ old('reg_no_attach') }}">
                                @if($errors->has('reg_no_attach'))
                                    @foreach ($errors->get('reg_no_attach') as $error)
                                        <small style="color: red;">{{ $error}}</small>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">টিন সার্টিফিকেট ও আয়কর সার্টিফিকেট<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tin_no" type="text" value="{{ old('tin_no') }}">
                                @if($errors->has('tin_no'))
                                    <small style="color: red;">{{ $errors->first('tin_no') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত করতে হবে<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} type="file" name="tin_no_attach" >
                                @if($errors->has('tin_no_attach'))
                                    @foreach ($errors->get('tin_no_attach') as $error)
                                        <small style="color: red;">{{ $error}}</small>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ভ্যাট রেজি:নম্বর<span class=""> (Optional)</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="vat_reg_no" type="text" value="{{ old('vat_reg_no') }}">
                                @if($errors->has('vat_reg_no'))
                                    <small style="color: red;">{{ $errors->first('vat_reg_no') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত করতে হবে<span class=""> (Optional)</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="vat_reg_no_attach" value="{{ old('vat_reg_no_attach') }}">
                                @if($errors->has('vat_reg_no_attach'))
                                    @foreach ($errors->get('vat_reg_no_attach') as $error)
                                        <small style="color: red;">{{ $error}}</small>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">চালান নম্বর<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} class="form-control"  type="text" name="chaalan_no" value="{{ old('chaalan_no') }}">
                                @if($errors->has('chaalan_no'))
                                    <small style="color: red;">{{ $errors->first('chaalan_no') }}</small>
                                @endif
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">তারিখ<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{--placeholder="{{ old('date')?date('F d, Y', strtotime(old('date'))):'Select Date' }}"--}}
                                <input {{ $required_att }} placeholder="Select Date" type="text" name="date" value="{{ old('date')?old('date'):'' }}" class="form-control " id="single_cal2" autocomplete="off" >
                                @if($errors->has('date'))
                                    <small style="color: red;">{{ $errors->first('date') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ব্যাংকের নাম<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} type="text" name="bank_name" class="form-control col-md-7 col-xs-12" value="{{ old('bank_name') }}">
                                @if($errors->has('bank_name'))
                                    <small style="color: red;">{{ $errors->first('bank_name') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">শাখার নাম<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input {{ $required_att }} type="text" name="branch_name" class="form-control col-md-7 col-xs-12" value="{{ old('branch_name') }}">
                                @if($errors->has('branch_name'))
                                    <small style="color: red;">{{ $errors->first('branch_name') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">চালান ( কোড নং-১১৭০১০০০১২৬৮১) জমাকৃত টাকার পরিমাণ<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label><input {{ $required_att }} type="radio" name="fee_type" value="national_fee">স্থানীয় মেলা আয়োজনের ফি ৫০০০/- (পাঁচ হাজার) টাকা</label>
                                <label><input type="radio" name="fee_type" value="international_fee">আন্তর্জাতিক মেলা আয়োজনের ফি ২০০ মার্কিন ডলারের  সমপরিমাণ টাকা </label>
                                <div>@if($errors->has('fee_type'))
                                        <small style="color: red;">{{ $errors->first('fee_type') }}</small>
                                    @endif</div>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="/applications" role="button" class="btn btn-primary">Cancel</a>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    @include('layouts.include.date-related-script')
    <script type="text/javascript">
        function validateForm() {
            var id = true;
            @if(\Illuminate\Support\Facades\Auth::user()->role < 3)
                var u = document.forms["myform"]["user"].value;

                if(u == "default"){
                    document.getElementById("uu").innerHTML = "Select an user";
                    id = false;
                }
            @endif
            var x = document.forms["myform"]["applicant_telephone"].value;
            var y = document.forms["myform"]["applicant_mobile"].value;
            if (x == "" && y == "") {
                document.getElementById("hint").innerHTML = "Phone number or Telephone number must be filled up";
                id = false;
            }
            return id;
        }
    </script>

@endsection