@extends('layouts/contentNavbarLayout')



@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection



@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('labour.index') }}">View All</a>
    </h4>

    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">

          <h5 class="card-header">Create Labour</h5>

            <form action="{{ route('labour.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="row g-3">

                    <div class="col-md-6">
                        <label for="first_name"  class="form-label" >First Name *</label>
                        <input type="text" required="required" id="first_name" name="first_name" class="form-control form-control-lg" placeholder="First Name *">

                        @error('first_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label for="last_name"  class="form-label" >Last Name *</label>
                      <input type="text" required="required" id="last_name" name="last_name" class="form-control form-control-lg" placeholder="Last Name *">

                      @error('last_name')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="py-2 col-md-6">
                        <label for="idn_number"  class="form-label" >Identity Number *</label>
                        <input type="number" required="required" id="idn_number" name="idn_number" class="form-control form-control-lg" placeholder="Identity Number (SSN) OR (CNIC)*">

                        @error('idn_number')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2 col-md-6">
                      <label for="phone"  class="form-label" >Phone no *</label>
                      <input type="number" required="required" id="phone" name="phone" class="form-control form-control-lg" placeholder="Phone no *">

                      @error('phone')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="py-2 col-md-6">
                      <label for="age"  class="form-label" >Age *</label>
                      <input type="number" required="required" id="age" name="age" class="form-control form-control-lg" placeholder="Age *">

                      @error('age')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="py-2 col-md-6">
                      <label for="address"  class="form-label" >Address *</label>
                      <input type="text" required="required" id="address" name="address" class="form-control form-control-lg" placeholder="Address *">

                      @error('address')
                      <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror

                    </div>

                    <div class="py-2 col-md-6">
                      <label for="city"  class="form-label" >City *</label>
                      <input type="text" required="required" id="city" name="city" class="form-control form-control-lg" placeholder="City *">

                      @error('city')
                      <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror

                    </div>

                    <div class="py-2 col-md-6">
                      <label for="work_type"  class="form-label" >Work Type *</label>
                      <input type="text" required="required" id="work_type" name="work_type" class="form-control form-control-lg" placeholder="e.g Driver, cashier etc *">

                      @error('work_type')
                      <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror

                    </div>

                    <div class="py-2 col-md-6">
                        <label for="join_date"  class="form-label" >Join Date *</label>
                        <input type="text" class="form-control form-control-lg" placeholder="YYYY-MM-DD" id="flatpickr-date" name="join_date"/>

                        @error('join_date')
                                <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2 col-md-6">
                      <label for="salary"  class="form-label" >Monthly Salary *</label>
                      <input type="number" required="required" id="salary" name="salary" class="form-control form-control-lg" placeholder="Monthly Salary *">

                      @error('salary')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                    </div>


                  </div>

                    <button class="btn btn-primary d-grid w-100 mt-4" type="submit">Create</button>
                </div>

            </form>

        </div>

      </div>

    </div>

</div>

@endsection
