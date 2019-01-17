@extends('layouts.master')

@section('content')
    <div class="panel panel-info" style="margin: 60px;">
        <div class="page-header" style="text-align: center"><h1>আবেদন ফরম বিবরণী </h1></div>
        <div class="panel-body">
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
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >মেলার ধরণ</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->festival_type ? 'দেশী':'আন্তর্জাতিক' }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">মেলা/প্রদর্শনীর মেয়াদকাল</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ date('F d, Y', strtotime($application->from) ) }} to {{ date('F d, Y', strtotime($application->to)) }}</p></div>
                </div>
            </div>

            {{--Name with attachment--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >মেলা/প্রদর্শনীর স্থান</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->festival_place }}</p></div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                    <div class="col-md-1">--</div>
                    <div>
                    <img class="col-md-7" src="/uploads/{{$application->festival_place_attach}}" alt=""><span class="pull-right" style="margin-right: 5px;">
                    <a href="/uploads/{{$application->festival_place_attach}}" download="স্থান বরাদ্দপত্র সংযুক্তি" class="btn btn-dark"><span class="glyphicon glyphicon-save"></span> Download</a></span></div>
                </div>
            </div>

            {{--Name with attachment--}}

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

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >টেলিফোন নম্বর</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->applicant_telephone ? $application->applicant_telephone:'Not Available' }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">মোবাইল নম্বর</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->applicant_mobile ? $application->applicant_mobile:'Not Available' }}</p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >ইমেইল</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p for="name">{{ $application->applicant_email }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;"><label for="name">কোম্পানি রেজি:নম্বর/ট্রেড লাইসেন্স</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->reg_no }}</p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                    <div class="col-md-1">--</div>
                    @php
                        echo base_path();
                    @endphp
                    <div ><img class="col-md-7" src="/{{$application->reg_no_attach}}" alt="">
                        <span class="pull-right" style="margin-right: 5px;">
                        <a href="/uploads/{{$application->reg_no_attach}}" download="হালনাগাদ কপি সংযুক্তি" class="btn btn-dark"><span class="glyphicon glyphicon-save"></span> Download</a></span></div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-4" style="text-align: right;"><label for="name">টিন সার্টিফিকেট ও আয়কর সার্টিফিকেট</label></div>
                        <div class="col-md-1">--</div>
                        <div class="col-md-7"><p>{{ $application->tin_no }}</p></div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                    <div class="col-md-1">--</div>
                    <div ><img class="col-md-7"  src="/uploads/{{$application->tin_no_attach}}" alt="">
                        <span class="pull-right" style="margin-right: 5px;">
                        <a href="/uploads/{{$application->tin_no_attach}}" download="হালনাগাদ কপি সংযুক্তি" class="btn btn-dark"><span class="glyphicon glyphicon-save"></span> Download</a></span></div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-4" style="text-align: right;"><label for="name">ভ্যাট রেজি:নম্বর</label></div>
                        <div class="col-md-1">--</div>
                        <div class="col-md-7"><p>{{ $application->vat_reg_no }}</p></div>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name" >হালনাগাদ কপি সংযুক্তি</label></div>
                    <div class="col-md-1">--</div>
                    @php
                        echo url('/uploads/'.$application->vat_reg_no_attach);
                    @endphp
                    <div ><img class="col-md-7"  src= '/uploads/'.{{$application->vat_reg_no_attach}} >
                        <span class="pull-right" style="margin-right: 5px;">

                        <a href="{{ asset('/uploads/'.$application->vat_reg_no_attach) }}" download="হালনাগাদ কপি সংযুক্তি" class="btn btn-dark"><span class="glyphicon glyphicon-save"></span> Download</a></span></div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4" style="text-align: right;" ><label for="name">চালান নম্বর</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ $application->chaalan_no }}</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4"  style="text-align: right;"><label for="name" >তারিখ</label></div>
                    <div class="col-md-1">--</div>
                    <div class="col-md-7"><p>{{ date('F d, Y', strtotime($application->date)) }}</p></div>
                </div>

            </div>

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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-4" style="text-align: right;"><label for="name">চালান ( কোড নং-১১৭০১০০০১২৬৮১) জমাকৃত টাকার পরিমাণ</label></div>
                        <div class="col-md-1">--</div>
                        <div class="col-md-7"><p>{{ $application->fee_type ?
                                'ফি ৫০০০/- (পাঁচ হাজার) টাকা':'ফি ২০০ মার্কিন ডলারের  সমপরিমাণ টাকা ' }}</p></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel-footer">



                    <form  class="form-horizontal text-center form-label-left" method="post" action="/applications/{{$application->id}}" >
                        @csrf
                        @method('patch')

                        @if($application->status == 0 && Auth::user()->role < 3)
                            <div class="form-group">
                                <div >
                                    <button type="submit" name="process" class="btn btn-primary">Process</button>
                                    <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        @elseif($application->status == 1)
                            <div class="form-group">
                                <div >
                                    <i class="pull-right" style="color: green;">Processed on {{ date('F d, Y', strtotime($application->updated_at) ) }}</i>
                                </div>
                            </div>
                        @elseif($application->status == 2)
                            <div class="form-group">
                                <div >
                                    <i class="pull-right" style="color: red;">Rejected on {{ date('F d, Y', strtotime($application->updated_at) ) }}</i>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div >
                                    <i class="pull-right" style="color: #4b3e03">Unprocess, Created on {{ date('F d, Y', strtotime($application->created_at) ) }}</i>
                                </div>
                            </div>
                        @endif



                    </form>


            </div>

        </div>

    </div>

@endsection