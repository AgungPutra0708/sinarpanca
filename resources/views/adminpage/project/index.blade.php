@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Project Data</h6>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('set-project.create') }}" class="btn btn-primary">Create Project</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('set-project.index') }}",
                columns: [{
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'name_project',
                        name: 'name_project'
                    },
                    {
                        data: 'location_project',
                        name: 'location_project'
                    },
                    {
                        data: 'year_project',
                        name: 'year_project'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
