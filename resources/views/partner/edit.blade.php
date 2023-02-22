@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-4">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('partner.index') }}">View All</a>
  </h4>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-8">
      <div class="card mb-4">

        <h5 class="card-header">Edit Partner</h5>

            <form action="{{ route('partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="createsupplier-form">

                @csrf
                @method('PUT')

                <div class="card-body">

                  <div class="row g-3">

                    <div class="col-md-6">
                      <label for="percent"  class="form-label" >Percent% *</label>
                       <input type="number" required="required" id="percent" name="percent" value="{{ $partner->percent }}" class="form-control form-control-lg">
                       @error('percent')
                           <span class="create-supplier-error-message">{{$message}}</span>
                       @enderror
                   </div>

                    <div class="col-md-6">
                       <label for="name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="name" name="name" value="{{ $partner->name }}" class="form-control form-control-lg">
                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone_no"  class="form-label" >Phone Number *</label>
                        <input type="number" required="required" id="phone_no" name="phone_no" value="{{ $partner->phone_no }}" class="form-control form-control-lg">
                        @error('phone_no')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="py-2 col-md-6">
                        <label for="Address" class="form-label">Address *</label>
                        <input type="text" required="required" id="Address" name="Address" value="{{ $partner->Address }}" class="form-control form-control-lg">
                        @error('Address')
                                <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2 col-md-6">
                        <label for="Intity"  class="form-label">Intity *</label>
                        <input type="text" required="required" id="Intity" name="Intity" value="{{ $partner->Intity }}" class="form-control form-control-lg">
                        @error('Intity')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                  </div>

                    <button class="btn btn-primary d-grid w-100 mt-4" type="submit">Update</button>

                </div>

            </form>

           </div>

        </div>

    </div>

@endsection
