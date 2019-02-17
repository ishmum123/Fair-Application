<p>All Applications</p>

<!-- start project list -->
<table class="table table-striped table-condensed table-hover table-responsive" id="applications">
    <thead>
        <tr>
            <th>Fair Name</th>
            <th>Type</th>
            @if(auth()->user()->role != 'user')
                <th>Applicant Name</th>
                <th>Organization Name</th>
            @endif
            <th>Submission Date</th>
            @if($ajax_call == 'all')
                <th>Status</th>
            @endif
            @if($ajax_call != 'all' && $ajax_call != 'Unapproved')
                <th>{{ $ajax_call }} Date</th>
            @endif
            <th>View</th>
        </tr>
    </thead>
</table>

<!-- end project list -->

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
        $('#applications').DataTable({
            processing: true,
            serverSide: true,
            @if($ajax_call == 'all')
                ajax: '{{ url('/getAllApplicationsData') }}',
            @elseif($ajax_call == 'Unapproved')
                ajax: '{{ url('/getAllUnapprovedApplicationsData') }}',
            @elseif($ajax_call == 'Approved')
                ajax: '{{ url('/getAllApprovedApplicationsData') }}',
            @elseif($ajax_call == 'Rejected')
                ajax: '{{ url('/getAllRejectedApplicationsData') }}',
            @endif
            columns: [
                {data: 'festival_name', name: 'applications.festival_name'},
                {data: 'festival_type', name: 'applications.festival_type'},
                @if(auth()->user()->role != 'user')
                    {data: 'name', name: 'users.name'},
                    {data: 'organization_name', name: 'users.organization_name'},
                @endif
                {data: 'created_at', name: 'applications.created_at'},
                @if($ajax_call != 'all' && $ajax_call != 'Unapproved')
                {data: 'updated_at', name: 'applications.updated_at'},
                @endif
                @if($ajax_call == 'all')
                {data: 'status', name: 'applications.status'},
                @endif
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

    </script>
@endpush