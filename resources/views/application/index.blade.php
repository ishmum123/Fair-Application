@extends('layouts.master')
@section('content')

    @if(auth()->user()->role == 1)

        <div class="col-md-12">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Divisional</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Non Divisional</a>
                    </li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <p>All Applications</p>

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Submission Date</th>
                                @if($identity == 'all')
                                    <th>Status</th>
                                @endif
                                @if($identity != 'unapproved')
                                    <th>Process Date</th>
                                @endif
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $count = 0;
                            @endphp
                            @foreach($divisional_applications as $application)
                                @php
                                    if($application->status == 0) $color = 'btn-warning';
                                    elseif ($application->status == 1) $color = 'btn-success';
                                    else $color = 'btn-danger';
                                @endphp
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>
                                        {{ date('F d, Y', strtotime($application->created_at)) }}
                                        {{--                                {{ $application->created_at }}--}}

                                    </td>
                                    @if($identity == 'all')
                                    <td >
                                        <button style="width: 75px;" type="button" class="btn btn-xs {{ $color }}">
                                            @php
                                                if($application->status == 0){
                                                    echo "Unapproved";
                                                }
                                                elseif($application->status == 1){ echo "Approved";}
                                                else echo "Rejected";


                                            @endphp
                                        </button>
                                    </td>
                                    @endif
                                    @if($identity != 'unapproved')
                                    <td>
                                        @if($application->status == 0)
                                            <span style="color:darkgoldenrod">-</span>
                                        @elseif($application->status == 1)
                                            <span style="color:green">Approved</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                        @else
                                            <span style="color:red">Rejected</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                        @endif
                                    </td>
                                    @endif
                                    <td >
                                        <a href="/applications/{{$application->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <p>All Applications</p>

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Submission Date</th>
                                @if($identity == 'all')
                                    <th>Status</th>
                                @endif
                                @if($identity != 'unapproved')
                                    <th>Process Date</th>
                                @endif
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $count = 0;
                            @endphp
                            @foreach($non_divisional_applications as $application)
                                @php
                                    if($application->status == 0) $color = 'btn-warning';
                                    elseif ($application->status == 1) $color = 'btn-success';
                                    else $color = 'btn-danger';
                                @endphp
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>
                                        {{ date('F d, Y', strtotime($application->created_at)) }}
                                        {{--                                {{ $application->created_at }}--}}

                                    </td>

                                    @if($identity == 'all')

                                    <td >
                                        <button style="width: 75px;" type="button" class="btn btn-xs {{ $color }}">
                                            @php
                                                if($application->status == 0){
                                                    echo "Unapproved";
                                                }
                                                elseif($application->status == 1){ echo "Approved";}
                                                else echo "Rejected";


                                            @endphp
                                        </button>
                                    </td>
                                    @endif
                                    @if($identity != 'unapproved')
                                    <td>
                                        @if($application->status == 0)
                                            <span style="color:darkgoldenrod">-</span>
                                        @elseif($application->status == 1)
                                            <span style="color:green">Approved</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                        @else
                                            <span style="color:red">Rejected</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                        @endif
                                    </td>
                                    @endif
                                    <td >
                                        <a href="/applications/{{$application->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->
                    </div>

                </div>
            </div>


        </div>
        @else
        <p>All Applications</p>

        <!-- start project list -->
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>SL</th>
                <th>Submission Date</th>
                @if($identity == 'all')
                <th>Status</th>
                @endif
                @if($identity !='unapproved')
                <th>Process Date</th>
                @endif
                <th>View</th>
            </tr>
            </thead>
            <tbody>

            @php
                $count = 0;
            @endphp
            @foreach($applications as $application)
                @php
                    if($application->status == 0) $color = 'btn-warning';
                    elseif ($application->status == 1) $color = 'btn-success';
                    else $color = 'btn-danger';
                @endphp
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>
                        {{ date('F d, Y', strtotime($application->created_at)) }}
                        {{--                                {{ $application->created_at }}--}}

                    </td>
                    @if($identity == 'all')
                    <td >
                        <button style="width: 75px;" type="button" class="btn btn-xs {{ $color }}">
                            @php
                                if($application->status == 0){
                                    echo "Unapproved";
                                }
                                elseif($application->status == 1){ echo "Approved";}
                                else echo "Rejected";


                            @endphp
                        </button>
                    </td>
                    @endif
                    @if($identity != 'unapproved')
                    <td>
                        @if($application->status == 0)
                            <span style="color:darkgoldenrod">-</span>
                        @elseif($application->status == 1)
                            <span style="color:green">Approved</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                        @else
                            <span style="color:red">Rejected</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                        @endif
                    </td>
                    @endif
                    <td >
                        <a href="/applications/{{$application->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- end project list -->
    @endif
@endsection
