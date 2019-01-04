@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Applications</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <p>All Applications</p>

                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Title</th>
                        <th>Applicant</th>
                        <th>Project Progress</th>
                        <th>Status</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $count = 0;
                    @endphp
                    @foreach($applications as $application)

                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>
                                {{ $application->title }}
                            </td>
                            <td>
                                @php
                                $applicant = $application->user;
                                @endphp
                                <a  role="button" href="/users/{{$applicant->id}}">{{ $applicant->name }}</a>
                            </td>
                            <td class="project_progress">
                                @php
                                    if($application->status == 0) { $progress = 10; $color = 'btn-warning'; }
                                    elseif($application->status == 1) { $progress = 89; $color = 'btn-success'; }
                                    else { $progress = 90; $color = 'btn-danger'; }
                                @endphp
                                <div class="progress progress_sm">
                                    <div class="progress-bar {{ $progress > 0 && $progress < 90 ? 'bg-green': 'bg-red' }}" role="progressbar" data-transitiongoal="{{ $progress }}" aria-valuenow="57" style="width: 57%;"></div>
                                </div>
                                <small>{{ $progress > 0 && $progress < 90 ? $progress.'%completed' : 'Rejected'  }}</small>
                            </td>
                            <td class="col-md-2">
                                <button type="button" class="btn {{ $color }} btn-xs">
                                    @php
                                        if($application->status == 0){
                                            echo "Unprocessed";
                                        }
                                        elseif($application->status == 1){ echo "Processed";}
                                        else echo "Rejected";


                                    @endphp
                                </button>
                            </td>
                            <td class="col-md-3">
                                <a href="/applications/{{$application->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>

                                @if(\Illuminate\Support\Facades\Auth::user()->role < 3)
                                    <form class="form-inline" action="/applications/{{$application->id}}" method="post" style="display:inline;">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-info btn-xs" name="process" {{$application->status !=0 ? 'disabled':''}}>Process</button>
                                        <button type="submit" class="btn btn-danger btn-xs" name="reject" {{$application->status !=0 ? 'disabled':''}}>Reject</button>
                                    </form>

                                 @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- end project list -->

            </div>
        </div>
    </div>
@endsection
