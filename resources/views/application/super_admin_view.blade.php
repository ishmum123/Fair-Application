<div class="col-md-12">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#divisional_app" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Divisional</a>
            </li>
            <li role="presentation" class=""><a href="#non_divisional_app" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Non Divisional</a>
            </li>

        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="divisional_app" aria-labelledby="home-tab">
                <p>All Divisional Applications</p>
                <table class="table table-striped table-condensed table-hover table-responsive" id="divisional">
                    <thead>
                    <tr>
                        <th>Fair Name</th>
                        <th>Type</th>
                        <th>Applicant</th>
                        <th>Organization</th>
                        <th>District</th>
                        <th>Submission Date</th>
                        @if($ajax_call != 'all' && $ajax_call != 'Unapproved')
                            @if($ajax_call == 'Approved')
                                <th>Approved Date</th>
                            @else <th>Rejected Date</th>
                            @endif
                        @endif
                        @if($ajax_call == 'all')
                            <th>Status</th>
                        @endif
                        <th>View</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="non_divisional_app" aria-labelledby="profile-tab">
                <p>All NonDivisional Applications</p>
                <table class="table table-striped table-condensed table-hover table-responsive" id="non_divisional">
                    <thead>
                    <tr>
                        <th>Fair Name</th>
                        <th>Type</th>
                        <th>Applicant</th>
                        <th>Organization</th>
                        <th>District</th>
                        <th>Submission Date</th>
                        @if($ajax_call != 'all' && $ajax_call != 'Unapproved')
                            @if($ajax_call == 'Approved')
                                <th>Approved Date</th>
                            @else <th>Rejected Date</th>
                            @endif
                        @endif
                        @if($ajax_call == 'all')
                            <th>Status</th>
                        @endif
                        <th>View</th>
                    </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>


</div>


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
        $('#divisional').DataTable({
            processing: true,
            serverSide: true,
            @if($ajax_call == 'all')
            ajax: '{{ url('/getAllDivisionalApplicationsData') }}',
            @elseif($ajax_call == 'Unapproved')
            ajax: '{{ url('/getAllDivisionalUnapprovedApplicationsData') }}',
            @elseif($ajax_call == 'Approved')
            ajax: '{{ url('/getAllDivisionalApprovedApplicationsData') }}',
            @elseif($ajax_call == 'Rejected')
            ajax: '{{ url('/getAllDivisionalRejectedApplicationsData') }}',
            @endif
            columns: [
                {data: 'festival_name', name: 'applications.festival_name'},
                {data: 'festival_type', name: 'applications.festival_type'},
                {data: 'name', name: 'users.name'},
                {data: 'organization_name', name: 'users.organization_name'},
                {data: 'district_name', name: 'districts.name'},
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



        $('#non_divisional').DataTable({
            processing: true,
            serverSide: true,
            @if($ajax_call == 'all')
            ajax: '{{ url('/getAllNonDivisionalApplicationsData') }}',
            @elseif($ajax_call == 'Unapproved')
            ajax: '{{ url('/getAllNonDivisionalUnapprovedApplicationsData') }}',
            @elseif($ajax_call == 'Approved')
            ajax: '{{ url('/getAllNonDivisionalApprovedApplicationsData') }}',
            @elseif($ajax_call == 'Rejected')
            ajax: '{{ url('/getAllNonDivisionalRejectedApplicationsData') }}',
            @endif
            columns: [
                {data: 'festival_name', name: 'applications.festival_name'},
                {data: 'festival_type', name: 'applications.festival_type'},
                {data: 'name', name: 'users.name'},
                {data: 'organization_name', name: 'users.organization_name'},
                {data: 'district_name', name: 'districts.name'},
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