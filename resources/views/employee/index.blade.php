@extends('layouts.app3')

@section('content')
    <!-- Content Row -->
    <div class="row" id="app">
        <employee-component></employee-component>
    </div>
@endsection
@section('scripts')
{{--    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>--}}
{{--    <script src="{{url('/js/main.js')}}"></script>--}}
    <script src="{{mix('/js/employees.js')}}"></script>
@endsection
