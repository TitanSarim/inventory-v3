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
      <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('assets.index') }}">View All</a>
    </h4>

    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">

          <h5 class="card-header">Create Asset</h5>

            <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="row g-3">

                    <div class="col-md-6">
                        <label for="name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="name" name="name" class="form-control form-control-lg" placeholder="Name *">

                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label for="payment_type" class="form-label">Select Type</label>
                          <select class="form-select form-select-lg" name="payment_type" id="payment_type">
                              <option value="" disabled selected>Choose</option>
                              <option style="cursor: pointer;" value="Paid">Paid</option>
                              <option value="Pending">Pending</option>
                              <option value="On Loan">On Loan</option>
                          </select>

                        @error('payment_type')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2 col-md-6">
                        <label for="amount"  class="form-label" >Amount *</label>
                        <input type="number" required="required" id="amount" name="amount" class="form-control form-control-lg" placeholder="Amount *">

                        @error('amount')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="py-2 col-md-6">
                        <label for="buying_year"  class="form-label" >Year of Purchase *</label>
                        <input type="text" class="form-control form-control-lg" placeholder="YYYY-MM-DD" id="flatpickr-date" name="buying_year"/>

                        @error('buying_year')
                                <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2 col-md-6">
                      <label for="buying_from"  class="form-label" >Buying From *</label>
                      <input type="text" required="required" id="buying_from" name="buying_from" class="form-control form-control-lg" placeholder="Buying From *">

                      @error('buying_from')
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
