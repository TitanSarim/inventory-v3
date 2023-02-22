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

                <h4 class="mb-1 pt-2">Verify your email ✉️</h4>


                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
