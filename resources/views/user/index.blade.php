@extends('layouts.app3')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        {{--        <h1>Dashboard</h1>--}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <ul>
                            @foreach($users as $k=>$user)
                                <li>{{$user->username}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
