@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('partner.index') }}">View All</a>
    </h4>

    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">

          <h5 class="card-header">Create Partner</h5>

            <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="row g-3">

                    <div class="col-md-6">
                      <label for="supplier_name"  class="form-label" >Percent of Share *</label>
                      <input type="number" required="required" id="percent" name="percent" class="form-control form-control-lg" placeholder="Share % *">
                      @error('percent')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                  </div>

                    <div class="col-md-6">
                        <label for="name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="name" name="name" class="form-control form-control-lg" placeholder="name *">
                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2 col-md-6">
                        <label for="phone_no"  class="form-label" >Phone Number *</label>
                        <input type="number" required="required" id="phone_no" name="phone_no" class="form-control form-control-lg" placeholder="Phone no *">

                        @error('phone_no')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="py-2 col-md-6">
                        <label for="Address" class="form-label">Address *</label>
                        <input type="text" required="required" id="Address" name="Address" class="form-control form-control-lg" placeholder="Address *">
                        @error('Address')
                                <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-1 col-md-6">
                        <label for="Intity"  class="form-label">Intity *</label>
                        <input type="text" required="required" id="Intity" name="Intity" class="form-control form-control-lg" placeholder="e.g CEO or Shareholder*">
                        @error('Intity')
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

</div>

@endsection
