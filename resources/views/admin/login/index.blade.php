@extends('admin.layout')

@section('content')
<div class="login-holder">
    <div class="col-sm-12 match-height">
        <div class="box-mid-out">
            <div class="box-mid-in">
                <div class="box-login box-shadow text-center">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div>
                            <img class="login-logo" src="{{ asset('storage/images/admin/logo-default.png') }}" alt="Gangga Express">
                            <h2 class="mb-30">
                                <span class="font18 title-main display-xs-block">Admin Login</span>
                            </h2>
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Username</label>
                            <div class="seamless-input-group">
                                <span class="seamless-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                            </div>
                            @error('username')
                                <span class="invalid-feedback text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Password</label>
                            <div class="seamless-input-group">
                                <span class="seamless-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            @error('password')
                                <span class="invalid-feedback text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-standard mt-15">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection