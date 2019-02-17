@extends('layouts.master')
@section('content')

    <table id="admins-table" class="table table-condensed" style="margin-top: 50px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>District</th>
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
        $('#admins-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/getAdminsData',
            columns: [

                {data: 'a', name: 'users.name'},
                {data: 'email', name: 'users.email'},
                {data: 'name', name: 'districts.name'},
                {data: 'status', name: 'users.status'},
                {data: 'action', name:'action', orderable: false, searchable: false},


            ]
        });
    </script>
@endpush
