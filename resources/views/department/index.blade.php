@extends('layouts.app3')

@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <form class="form-inline">
                    <a class="btn btn-primary btn-sm" href="{{url('department/create')}}"><i class="fa fa-plus"></i> Create New</a>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-condensed" id="dataTable">
                            <thead>
                            <th>id</th>
                            <th>Name</th>
                            <th></th>
                            </thead>
                            <tfoot>
                            <th>id</th>
                            <th>Name</th>
                            <th></th>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    <script>


        var oTable = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{url('/department_search')}}',
                data: function (d) {}
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    </script>
@endsection
