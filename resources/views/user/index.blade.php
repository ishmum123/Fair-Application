@extends('layouts.master')
@section('content')

    <table id="users-table" class="table table-condensed" style="margin-top: 50px;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Organization</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>View</th>
        </tr>
        </thead>
    </table>

@endsection


@push('datatables_library')
    <!-- jQuery -->
    <script src="{{ asset('datatables/jquery.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('datatables/jquery.min.js2') }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('datatables/bootstrap.min.js') }}"></script>
    <!-- App scripts -->
@endpush

@push('scripts')
    <script>
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('getUsersData') }}',
            // ajax: url('getUsersData'),
            columns: [

                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'organization_name', name: 'organization_name'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'status', name: 'status'},
                {data: 'action', name:'action', orderable: false, searchable: false},


            ]
        });
    </script>
@endpush
