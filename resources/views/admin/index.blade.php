@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <p>All Admins</p>

        <!-- start project list -->
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>

            @php
                $count = 0;
            @endphp
            @foreach($admins as $admin)

                <tr>
                    <td>{{ ++$count }}</td>
                    <td>
                        {{ $admin->name }}

                    </td>

                    <td >
                        <a href="/admins/{{$admin->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- end project list -->

    </div>
@endsection