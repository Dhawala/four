@extends('layouts.app3')

@section('content')
    <!-- Content Row -->
    <div class="row" id="app">
        <employee-component></employee-component>
    </div>
@endsection
@section('scripts')
    <script src="{{mix('/js/employees.js')}}"></script>
@endsection
