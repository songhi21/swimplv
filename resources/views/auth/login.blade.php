@extends('layouts.app')
<link href="{{ config('variable.url') }}css/style.css" rel="stylesheet">
<link href="{{ config('variable.url') }}css/font.css" rel="stylesheet">
@vite(['resources/js/app.js'])
@section('content')
<div class="container" onclick="onclick">
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">
        <img src="{{ config('variable.url') }}image/p3.png" style="width: 40%"/>
         <h2>SWIM Project 3 Central Hub</h2>
                    
            {{-- <div class="card-header">{{ __('Login') }}</div> --}}

            {{-- <div class="card-body"> --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <div role="alert" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 300)">
                        <span class="invalid-feedback" >
                            <strong class="errormessagecolor">{{ $message }}</strong>
                        </span>

                    </div>
                @enderror

                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                @enderror
{{-- 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div> --}}

                <button type="submit" class="prevent bn5">
                    {{ __('Login') }}
                </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    <a href="{{ config('variable.url') }}/" class="center2">HomePage</a>
                    </div>
                

            </form>
           
</div>
@endsection
