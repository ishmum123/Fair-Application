@extends('layouts.master')

@section('content')
    <div class="panel panel-info" style="margin: 60px;">
        <div class="page-header" style="text-align: center"><h1>আবেদন ফরম বিবরণী </h1></div>
        <div class="panel-body">

            {{--Applicant name--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name" >আবেদনকারী</label></div>
                    <div class="col-md-1">--</div>
                    @php
                        $applicant = \Illuminate\Support\Facades\DB::table('users')->where('id',$application->user_id)->get();
                    @endphp
                    <div class="col-md-7"><p for="name">{{ $applicant[0]->name }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">মেলা/প্রদর্শনীর নাম</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->festival_name }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">জেলা</label></div>
                    <div class="col-md-1">--</div>
                    @php
                        $district = \Illuminate\Support\Facades\DB::table('districts')->where('id',$application->district_id)->get();
                    @endphp
                    <div class="col-md-7"><p for="name">{{ $district[0]->name }}</p></div>
                </div>
            </div>

            {{--Fair Type--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >মেলার ধরণ</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->festival_type == 'national' ? 'দেশী [ ফি ৫০০০/- (পাঁচ হাজার) টাকা ]':'আন্তর্জাতিক [ ফি ২০০ মার্কিন ডলারের  সমপরিমাণ টাকা  ]' }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">মেলা/প্রদর্শনীর মেয়াদকাল</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ date('F d, Y', strtotime($application->from) ) }} to {{ date('F d, Y', strtotime($application->to)) }}</p></div>
                </div>
            </div>

            {{--Fair Place name--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >মেলা/প্রদর্শনীর স্থান</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->festival_place }}</p></div>
                </div>

            </div>

            {{--Fest place attachment--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                    <div class="col-md-1">--</div>


                    @if(substr($application->festival_place_attach,-4) == '.pdf')
                        <div class="col-md-7">
                            <span  for="">স্থান বরাদ্দপত্র সংযুক্তি.pdf</span>
                            <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->festival_place_attach}}" download="স্থান বরাদ্দপত্র সংযুক্তি" class="btn btn-dark">
                            <span class="glyphicon glyphicon-save "></span> Download</a></span>
                        </div>
                        @else
                            <div class="col-md-5">
                                <img class="col-md-12" src="/uploads/{{$application->festival_place_attach}}" alt="">
                                <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->festival_place_attach}}" download="স্থান বরাদ্দপত্র সংযুক্তি" class="btn btn-dark">
                                <span class="glyphicon glyphicon-save "></span> Download</a></span>
                            </div>
                    @endif


                </div>
            </div>

            {{--Organization name and address--}}

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >আবেদনকারী প্রতিষ্ঠান/সংগঠনের নাম</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->applicant_name }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">প্রতিষ্ঠান/সংগঠনের  ঠিকানা</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->applicant_address }}</p></div>
                </div>
            </div>



            {{--Trade license--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">কোম্পানি রেজি:নম্বর/ট্রেড লাইসেন্স</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->reg_no }}</p></div>
                </div>
            </div>

            {{--Trade license attachment--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                    <div class="col-md-1">--</div>
                    @if(substr($application->reg_no_attach,-4) == '.pdf')
                        <div class="col-md-7">
                            <span  for="">রেজিস্ট্রেশন নম্বরের সংযুক্তি.pdf</span>
                            <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->reg_no_attach}}" download="রেজিস্ট্রেশন নম্বরের সংযুক্তি" class="btn btn-dark">
                            <span class="glyphicon glyphicon-save "></span> Download</a></span>
                        </div>
                    @else
                        <div class="col-md-5">
                            <img class="col-md-12" src="/uploads/{{$application->reg_no_attach}}" alt="">
                            <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->reg_no_attach}}" download="রেজিস্ট্রেশন নম্বরের সংযুক্তি" class="btn btn-dark">
                                <span class="glyphicon glyphicon-save "></span> Download</a></span>
                        </div>
                    @endif
                </div>

            </div>


            {{--Tin Certificate--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-4" style="text-align: right;"><label for="name">টিন সার্টিফিকেট ও আয়কর সার্টিফিকেট</label></div>
                        <div class="col-md-1">--</div>
                        <div class="col-md-7"><p>{{ $application->tin_no }}</p></div>
                    </div>
                </div>

            </div>

            {{--Tin certificate attachment--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                    <div class="col-md-1">--</div>
                    @if(substr($application->tin_no_attach,-4) == '.pdf')
                        <div class="col-md-7">
                            <span  for="">টিন নম্বরের সংযুক্তি.pdf</span>
                            <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->tin_no_attach}}" download="টিন নম্বরের সংযুক্তি" class="btn btn-dark">
                            <span class="glyphicon glyphicon-save "></span> Download</a></span>
                        </div>
                    @else
                        <div class="col-md-5">
                            <img class="col-md-12" src="/uploads/{{$application->tin_no_attach}}" alt="">
                            <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->tin_no_attach}}" download="টিন নম্বরের সংযুক্তি" class="btn btn-dark">
                                <span class="glyphicon glyphicon-save "></span> Download</a></span>
                        </div>
                    @endif

                </div>

            </div>

            {{--Vat reg number (optional)--}}
            @if($application->vat_reg_no != null)
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="col-md-4" style="text-align: right;"><label for="name">ভ্যাট রেজি:নম্বর</label></div>
                            <div class="col-md-1">--</div>
                            <div class="col-md-7"><p>{{ $application->vat_reg_no }}</p></div>
                        </div>
                    </div>

                </div>
            @endif

            {{--Vat registration attachment (Optional)--}}
            @if($application->vat_reg_no_attach != null)
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4" style="text-align: right;" ><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                        <div class="col-md-1">--</div>
                        @if(substr($application->vat_reg_no_attach,-4) == '.pdf')
                            <div class="col-md-7">
                                <span  for="">ভ্যাট রেজিস্ট্রেশন নম্বরের সংযুক্তি.pdf</span>
                                <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->vat_reg_no_attach}}" download="রভ্যাট েজিস্ট্রেশন নম্বরের সংযুক্তি" class="btn btn-dark">
                            <span class="glyphicon glyphicon-save "></span> Download</a></span>
                            </div>
                        @else
                            <div class="col-md-5">
                                <img class="col-md-12" src="/uploads/{{$application->vat_reg_no_attach}}" alt="">
                                <span class="pull-right" style="margin-right: 5px;"><a href="/uploads/{{$application->vat_reg_no_attach}}" download="ভ্যাট রেজিস্ট্রেশন নম্বরের সংযুক্তি" class="btn btn-dark">
                                <span class="glyphicon glyphicon-save "></span> Download</a></span>
                            </div>
                        @endif

                    </div>

                </div>
            @endif

            {{--Chaalan Number--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name">চালান নম্বর</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->chaalan_no }}</p></div>
                </div>

            </div>
            {{--Bank and Branch Name--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name">ব্যাংকের নাম</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->bank_name }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >শাখার নাম</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->branch_name }}</p></div>
                </div>

            </div>


        </div>
        <div class="panel-footer">



                    <form  class="form-horizontal text-center form-label-left" method="post" action="/applications/{{$application->id}}" >
                        @csrf
                        @method('patch')

                        @if($application->status == 'Unapproved' && Auth::user()->role != 'user')
                            <div class="form-group">
                                <div >
                                    <button style="width: 100px;" type="submit" name="process" class="btn btn-primary">Approve</button>
                                    <button style="width: 100px;" type="submit" name="reject" class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        @elseif($application->status == 'Approved')
                            <div class="form-group">
                                <div >
                                    <i class="pull-right" style="color: green;">Approved on {{ date('F d, Y', strtotime($application->updated_at) ) }}</i>
                                </div>
                            </div>
                        @elseif($application->status == 'Rejected')
                            <div class="form-group">
                                <div >
                                    <i class="pull-right" style="color: red;">Rejected on {{ date('F d, Y', strtotime($application->updated_at) ) }}</i>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div >
                                    <i class="pull-right" style="color: #4b3e03">Unapproved, Created on {{ date('F d, Y', strtotime($application->created_at) ) }}</i>
                                </div>
                            </div>
                        @endif



                    </form>


            </div>

        </div>

    </div>

@endsection