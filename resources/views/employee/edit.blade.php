@extends('layouts.app3')

@section('content')
    <div class="row" id="app">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{url('/country/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> Edit country Info </h3>
                                    <hr>
                                    @csrf
                                    @method('put')
                                    <div class="col-md-12">
                                        <label>Country Code</label>
                                        <input type="text" class="form-control" name="country_code" id="country_code"
                                               value="{{$item->country_code}}"
                                               maxlength="20"
                                               required>
                                        @error('country_code')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Name</label>
                                        <input type="name" class="form-control" name="name" id="name"
                                               value="{{$item->name}}"
                                               maxlength="60"
                                               required>
                                        @error('name')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input class="btn btn-primary btn-sm" type="submit" id="submit" name="submit"
                                           value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
