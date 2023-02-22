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

                  <p class="mb-4">Confirm password 🔒</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-3 form-password-toggle">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary d-grid w-100">
                                    {{ __('Confirm Password') }}
                          </button>
                        </div>

                        <p class="text-center">
                          @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                            </a>
                          @endif
                        </p>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
