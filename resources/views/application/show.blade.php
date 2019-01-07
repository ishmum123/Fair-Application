@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                    <form class="form-horizontal form-label-left" method="post" action="/applications/{{$application->id}}" enctype="multipart/form-data" >
                        @csrf
                        @method('patch')
                        <span class="section">মেলা আয়োজনের অনুমোদনের জন্য অনলাইন আবেদন ফরম </span>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="users">আবেদনকারী</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @php
                                    $applicant = \Illuminate\Support\Facades\DB::table('users')->where('id',$application->user_id)->get();
                                @endphp
                                <input class="form-control col-md-7 col-xs-12" value="{{ $applicant[0]->name }}" readonly >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর নাম
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" value="{{ $application->festival_name }}" readonly >

                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলার ধরণ
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" value="{{ $application->festival_type ? 'দেশী':'আন্তর্জাতিক' }}" readonly="true" >
                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর মেয়াদকাল
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group input-daterange">
                                    <input type="text" class="form-control" name="from" value="{{ date('F d, Y', strtotime($application->from) ) }}" readonly="true">
                                    <div class="input-group-addon">to</div>
                                    <input type="text" class="form-control"  name="to" value="{{ date('F d, Y', strtotime($application->to)) }}" readonly="true">

                                </div>

                            </div>
                        </div>


                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মেলা/প্রদর্শনীর স্থান
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" value="{{ $application->festival_place }}" readonly="true" >
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">স্থান বরাদ্দপত্র সংযুক্ত
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="/storage/{{$application->festival_place_attach}}" alt="">
                            </div>

                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">আবেদনকারী প্রতিষ্ঠান/সংগঠনের নাম<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12"  readonly value="{{ $application->applicant_name }}">

                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">প্রতিষ্ঠান/সংগঠনের  ঠিকানা<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea  class="form-control col-md-7 col-xs-12" readonly>{{ $application->applicant_address }}</textarea>
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">টেলিফোন নম্বর
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->applicant_telephone }}">

                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">মোবাইল নম্বর
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->applicant_mobile }}">
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ইমেইল
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->applicant_email }}">
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">কোম্পানি রেজি:নম্বর/ট্রেড লাইসেন্স<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->reg_no }}">
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="/storage/{{$application->reg_no_attach}}" alt="">
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">টিন সার্টিফিকেট ও আয়কর সার্টিফিকেট
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->tin_no }}">
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="/storage/{{$application->tin_no_attach}}" alt="">
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ভ্যাট রেজি:নম্বর<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->vat_reg_no }}">
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">হালনাগাদ কপি সংযুক্ত
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="/storage/{{$application->vat_reg_no_attach}}" alt="">
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">চালান নম্বর<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->chaalan_no }}">
                            </div>

                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">তারিখ<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-4">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->date }}">
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ব্যাংকের নাম<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->bank_name }}">
                            </div>
                        </div>
                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">শাখার নাম<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12"  readonly  value="{{ $application->branch_name }}">
                            </div>
                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">চালান ( কোড নং-১১৭০১০০০১২৬৮১) জমাকৃত টাকার পরিমাণ
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" value="{{ $application->fee_type ?
                                'ফি ৫০০০/- (পাঁচ হাজার) টাকা':'ফি ২০০ মার্কিন ডলারের  সমপরিমাণ টাকা ' }}" readonly>
                            </div>
                        </div>



                        @if($application->status == 0 && Auth::user()->role < 3)
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" name="process" class="btn btn-primary">Process</button>
                                    <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        @elseif($application->status == 1)
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 alert-success" role="alert">
                                    Processed on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                </div>
                            </div>
                        @elseif($application->status == 2)
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 alert-danger" role="alert">
                                    Rejected on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 alert-warning" role="alert">
                                    Unprocess, Created on {{ date('F d, Y', strtotime($application->created_at) ) }}
                                </div>
                            </div>
                        @endif



                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection