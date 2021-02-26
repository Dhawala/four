@extends('layouts.app3')

@section('content')
    <!-- Content Row -->
    <div class="row" id="app" v-on:mousemove="cdn($event)">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2 class="d-inline-flex">Employees</h2>
                    <form class="form-inline">
                    <a class="btn btn-primary btn-sm" href="{{url('country/create')}}"><i class="fa fa-plus"></i> Create New</a>
                    </form>
                </div>
                <div class="card-body">
                    @{{message}}
                    <form class="form">
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control"
                               name="name" id="name"
                               placeholder="search"
                               v-model="message">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="{{url('/js/main.js')}}"></script>
@endsection
