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
      <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('transaction.index') }}">View All</a>
    </h4>

    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">

          <h5 class="card-header">Create Transaction</h5>

            <form action="{{ route('partnersTransaction.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="row g-3">

                    <div class="col-md-6">
                      <label for="payment_to_from" class="form-label">Transaction To & From</label>
                          <select class="form-select form-select-lg" name="payment_to_from" id="payment_to_from">
                              <option value="" disabled selected>Choose parthner</option>
                              @foreach( $partners as $partner)
                                <option style="cursor: pointer;"  value="{{ $partner->name }}">{{ $partner->name}}</option>
                              @endforeach
                          </select>
                    </div>

                    <div class="col-md-6">
                      <label for="payment_to_from" class="form-label">Account Affected By</label>
                          <select class="form-select form-select-lg" name="type" id="type">
                              <option value="" disabled selected>Choose</option>
                              <option>Debit</option>
                              <option>Credit</option>
                              <option>Loan</option>
                          </select>

                        @error('type')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label for="payment_to_from" class="form-label">By</label>
                          <select class="form-select form-select-lg" name="using" id="using">
                              <option value="" disabled selected>Choose</option>
                              <option>Cash</option>
                              <option>Card</option>
                              <option>Bank Tranfer</option>
                              <option>Cheque</option>
                          </select>

                        @error('using')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="amount"  class="form-label" >Amount *</label>
                        <input type="number" required="required" id="amount" name="amount" class="form-control form-control-lg" placeholder="Amount *">

                        @error('amount')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label for="payment_to_from" class="form-label">Status</label>
                          <select class="form-select form-select-lg" name="status" id="status">
                              <option value="" disabled selected>Choose</option>
                              <option>Verified</option>
                              <option>Pending</option>
                              <option>Rejected</option>
                          </select>

                        @error('status')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="buying_year"  class="form-label" >Date *</label>
                        <input type="text" class="form-control form-control-lg" placeholder="YYYY-MM-DD" id="flatpickr-date" name="transaction_date_time"/>

                        @error('transaction_date_time	')
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
