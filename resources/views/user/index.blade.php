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
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
