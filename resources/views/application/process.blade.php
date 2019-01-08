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

                    </td>

                    <td>

                        <span style="color: green;"> {{ date('F d, Y', strtotime($application->updated_at) ) }} </span>

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
