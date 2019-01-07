@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <p>All Users</p>

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
            @foreach($users as $user)

                <tr>
                    <td>{{ ++$count }}</td>
                    <td>
                        {{ $user->name }}

                    </td>

                    <td >
                        <a href="/users/{{$user->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- end project list -->

    </div>
@endsection
