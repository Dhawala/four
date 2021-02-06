@extends('layouts.app3')

@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <form method="POST" id="search-form" class="form-inline" role="form">

                        <div class="form-group mx-2 float-right">
                            <input type="text" class="form-control input-sm" name="username" id="username"
                                   placeholder="search name">
                        </div>

                        <div class="form-group mx-2 float-right">
                            <input type="text" class="form-control" name="email" id="email" placeholder="search email">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm ">Search</button>
                    </form>
                    <form class="form-inline">
                    <a class="btn btn-primary btn-sm" href="{{url('user/create')}}"><i class="fa fa-plus"></i> Create New</a>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-condensed" id="dataTable">
                            <thead>
                            <th>id</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>last Name</th>
                            <th>Email</th>
                            <th></th>
                            </thead>
                            <tfoot>
                            <th>id</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>last Name</th>
                            <th>Email</th>
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
            searching: false,

            ajax: {
                url: '{{url('/user_search')}}',
                data: function (d) {
                    d.username = $('input[name=username]').val();
                    d.email = $('input[name=email]').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'username', name: 'username'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    </script>
@endsection
