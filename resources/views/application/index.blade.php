@extends('layouts.master')
@section('content')
    <div class="col-md-12">
                <p>All Applications</p>

                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Submission Date</th>
                        <th>Status</th>
                        <th>Process Date</th>
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

                            <td >
                                <button type="button" class="btn btn-xs {{ $color }}">
                                    @php
                                        if($application->status == 0){
                                            echo "Unprocessed";
                                        }
                                        elseif($application->status == 1){ echo "Processed";}
                                        else echo "Rejected";


                                    @endphp
                                </button>
                            </td>
                            <td>
                                @if($application->status == 0)
                                    <span style="color:darkgoldenrod">-</span>
                                @elseif($application->status == 1)
                                    <span style="color:green">Processed</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                @else
                                    <span style="color:red">Rejected</span> on {{ date('F d, Y', strtotime($application->updated_at) ) }}
                                @endif
                            </td>
                            <td >
                                <a href="/applications/{{$application->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- end project list -->

            </div>
@endsection
