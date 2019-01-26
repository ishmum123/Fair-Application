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
                <th>District</th>
                <th>Status</th>
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

                    <td>
                        @php
                            $district_name = \Illuminate\Support\Facades\DB::table('districts')->where('id', $admin->district_id)->get();

                        @endphp
                        {{ $district_name[0]->name }}
                    </td>

                    <td>
                        <button style="width: 60px;" type="button" class="{{ $admin->is_active ? 'btn btn-success btn-xs':'btn btn-warning btn-xs' }}">{{ $admin->is_active ? 'Active':'Inactive' }}</button>
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
