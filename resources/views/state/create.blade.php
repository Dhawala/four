@extends('layouts.app3')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{url('/country')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> Create Country </h3>
                                    <hr>
                                    @csrf
                                    <div class="col-md-12">
                                        <label>Country code</label>
                                        <input type="text" class="form-control" name="country_code" id="country_code"
                                               value="{{old('country_code')}}"
                                               maxlength="20"
                                               required>
                                        @error('country_code')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>name</label>
                                        <input type="name" class="form-control" name="name" id="name"
                                               value="{{old('name')}}"
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
