@extends('layouts.loginlayouts')
<link href="{{ config('variable.url') }}css/style.css" rel="stylesheet">
<link href="{{ config('variable.url') }}css/font.css" rel="stylesheet">
{{-- @vite(['resources/js/app.js']) --}}
@section('content')
<div class="container" onclick="onclick" >
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">
        <br>
        <br>
        <br>
        <br>
        <img src="{{ config('variable.url') }}image/p3.png" style="width: 40%"/>
         <h2>SWIMP3 CentralHub</h2>
                    
            {{-- <div class="card-header">{{ __('Login') }}</div> --}}

            {{-- <div class="card-body"> --}}
                <form id="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus ><br>
                    <span id="email-error" class="invalid-feedback"></span><br>
                    @error('email')
                    <div role="alert" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 300)">
                        <span class="invalid-feedback">
                            <strong class="errormessagecolor">{{ $message }}</strong>
                        </span>
                    </div>
                    @enderror
                    <input id="password" type="password" name="password" placeholder="Password"  required><br>
                    <span id="password-error" class="invalid-feedback"></span><br>
                
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                    @enderror
                    


                
                    <div class="recaptcha-container">
                        <!-- HTML code for the reCAPTCHA widget and error message -->
                        {!! NoCaptcha::renderJs() !!}
                        <div id="recaptcha-container" class="g-recaptcha centerbox" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}" ></div>
                        <span id="captcha-error" class="invalid-feedback" style="color: red"></span><br> <!-- Error message for reCAPTCHA -->
                        <!-- Reset reCAPTCHA button -->
                        <button id="reset-recaptcha" type="button" class="btn btn-primary btn-lg float-end">Reset</button>

                    </div>
                    <button type="submit" class="prevent bn5" id="btnsubmit">
                        {{ __('Login') }}
                    </button>
                </form>

                @if (Route::has('password.request'))
                    <div  style=" text-align: center; margin-bottom: 10px;">    
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
                <div style=" text-align: center; margin-bottom: 10px;">
                    <a href="{{ config('variable.url') }}/" >HomePage</a>
                </div>
                

            </form>
           
</div>
@endsection
