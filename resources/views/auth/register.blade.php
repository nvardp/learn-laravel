@extends('layouts.auth-master')


@section('title')
Register
@endsection

@section('content')
    <form class="login100-form validate-form" method="post" action="{{ route('register.perform') }}">
        @csrf
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        @include('layouts.partials.messages')

        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <span class="label-input100">Name</span>
            <input class="input100" type="text"  name="name" value="{{ old('name') }}" placeholder="John" autofocus>
            <span class="focus-input100"></span>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>
        
        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <span class="label-input100">Email address</span>
            <input class="input100" type="email"  name="email" value="{{ old('email') }}" placeholder="name@example.com" autofocus>
            <span class="focus-input100"></span>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        
        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <span class="label-input100">Usernames</span>
            <input class="input100" type="text"  value="{{ old('username') }}" name="username" placeholder="Username" >
            <span class="focus-input100"></span>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        
        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password"  value="{{ old('password') }}" name="password" placeholder="Password" >
            <span class="focus-input100"></span>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>


        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <span class="label-input100">Confirm Password</span>
            <input class="input100" type="password"  value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="Confirm Password" >
            <span class="focus-input100"></span>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>


        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit"> Register </button>
        </div>

    </form>
@endsection