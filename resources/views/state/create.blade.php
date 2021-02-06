@extends('layouts.app3')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{url('/user')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> Edit User Info </h3>
                                    <hr>
                                    @csrf
                                    <div class="col-md-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                               value="{{old('username')}}"
                                               maxlength="20"
                                               required>
                                        @error('username')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="{{old('email')}}"
                                               maxlength="60"
                                               required>
                                        @error('email')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                               value="{{old('first_name')}}"
                                               maxlength="60"
                                               required>
                                        @error('first_name')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                               value="{{old('last_name')}}"
                                               maxlength="60"
                                               required>
                                        @error('last_name')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label>New password</label>
                                        <input type="password" class="form-control" name="password"
                                               id="password"
                                               value=""
                                               maxlength="60"
                                               required>
                                        @error('password')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password"
                                               id="confirm_password"
                                               value=""
                                               maxlength="60"
                                               required>
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
