@extends('layouts/layoutMaster')

@section('authentication')


@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

<style>
  .image-height{
    height: 70px !important;
  }
  .demo-custom{
    height: 40px !important;
  }
</style>

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
  <script>
    element.addEventListener('input',function(){this.value=this.value.toLowerCase()});​​
  </script>
  <script scriptsrc="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">

            <div class="card">

                <div class="card-body">

                   <!-- Logo -->
                   <div class="app-brand justify-content-center mb-1 mt-2 image-height">
                    <a class="app-brand-link gap-1">
                      <span class="app-brand-logo demo demo-custom">
                        <img src="/images/sigmaa-icon.png" alt="siggmaa icon" width="30">
                      </span>
                      <span class="app-brand-text demo text-body fw-bold ms-1">SIGGMAA</span>
                    </a>
                  </div>
                  <!-- /Logo -->

                  <h4 class="mb-1 pt-2">Reset Password 🔒</h4>

                    <form method="POST" action="{{ route('password.update') }}" class="mb-3" id="formAuthentication">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary d-grid w-100">
                                    {{ __('Reset Password') }}
                          </button>
                        </div>
                    </form>

                </div>

            </div>


        </div>
    </div>
</div>
@endsection
