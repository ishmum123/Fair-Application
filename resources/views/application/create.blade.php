@extends('layouts.master')



@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                    <form onsubmit="return validateForm()" name="myform"
                          class="form-horizontal form-label-left" method="post" action="/applications" enctype="multipart/form-data" >
                        @csrf
                        {{--php calculation--}}
                        @php
                            $required_att = 'required';
                        @endphp
                        <span class="section">মেলা আয়োজনের অনুমোদনের জন্য অনলাইন আবেদন ফরম </span>

                        {{--User Selection--}}
                        @if( Auth::user()->role != 'user')
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

                        {{--District Selection Dropdown--}}
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

                        {{--Fair Name--}}
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

                        {{--Type of fair--}}
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলার ধরণ<span class="">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label><input {{ $required_att }}  type="radio" name="festival_type" value="national">দেশী (মেলা আয়োজনের ফি ৫০০০/- (পাঁচ হাজার) টাকা)</label>
                                <label><input type="radio" name="festival_type" value="international">আন্তর্জাতিক (মেলা আয়োজনের ফি ২০০ মার্কিন ডলারের  সমপরিমাণ টাকা )</label>
                                <div>@if($errors->has('festival_type'))
                                        <small style="color: red;">{{ $errors->first('festival_type') }}</small>
                                    @endif </div>
                            </div>
                        </div>

                        {{--Fair Duration--}}
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


                        {{--Fair Place--}}
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

                        {{--Fair Place attachment--}}
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


                        {{--Trade License of Company--}}
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

                        {{--Trade License attachment--}}
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

                        {{--Tin Certificate--}}
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

                        {{--Tin Certificate attachment--}}
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

                        {{--Vat registration Number--}}
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

                        {{--Vat registration Attachment--}}
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

                        {{--Chaalan Number--}}
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

                        {{--Date--}}
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

                        {{--Bank Name--}}
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

                        {{--Branch Name--}}
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





@endsection

@push('scripts')
    <script type="text/javascript">
        function validateForm() {
            var id = true;
                    @if(\Illuminate\Support\Facades\Auth::user()->role != 'user')
            var u = document.forms["myform"]["user"].value;

            if(u == "default"){
                document.getElementById("uu").innerHTML = "Select an user";
                id = false;
            }
            @endif

                return id;
        }

    </script>

    @include('layouts.include.date-related-script')

@endpush

