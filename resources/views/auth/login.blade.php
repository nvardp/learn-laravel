@extends('layouts.auth-master')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(../resources/images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Log in
                </span>
            </div>
            <form class="login100-form validate-form" method="post" action="{{ route('login.perform') }}">
                @csrf
        
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                @include('layouts.partials.messages')

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text"  value="{{ old('username') }}" name="username" placeholder="Enter username" autofocus>
                    <span class="focus-input100"></span>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

            
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password" value="{{ old('password') }}" required >
                    <span class="focus-input100"></span>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit"> Login </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection