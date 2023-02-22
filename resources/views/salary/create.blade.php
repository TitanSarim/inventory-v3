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


<script>

  function calculateDue(event){


  const salary = Number(document.getElementById("salary").value);

  const bonus = Number(document.getElementById("bonus").value);

  const total = salary + bonus;

  document.getElementById("total").value = total;

  console.log(total);
  }

</script>

@endsection



@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('salary.index') }}">View All</a>
    </h4>

    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">

          <h5 class="card-header">Create Salary</h5>

            <form action="{{ route('salary.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="row g-3">

                    <div class="col-md-6">
                      <label for="labour_name" class="form-label">Select Type</label>
                          <select class="form-select form-select-lg" name="labour_name" id="labour_name">
                              <option value="" disabled selected>Choose</option>
                              @foreach ($labour_details as $labour_name)
                              <option style="cursor: pointer;">{{ $labour_name->first_name }} {{ $labour_name->last_name }}</option>
                              @endforeach
                          </select>

                        @error('labour_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="salary"  class="form-label" >Salary *</label>
                        <input type="number" required="required" id="salary" name="salary" class="form-control form-control-lg" placeholder="Salary *" onkeyup="calculateDue(event)">

                        @error('salary')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                      <label for="bonus"  class="form-label" >Bonus</label>
                      <input type="number" required="required" id="bonus" name="bonus" class="form-control form-control-lg" value="0" onkeyup="calculateDue(event)">

                      @error('salary')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="col-md-6">
                      <label for="total"  class="form-label" >Total</label>
                      <input type="number" required="required" id="total" name="total" class="form-control form-control-lg" value="" readonly>

                      @error('total')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                    </div>


                    <div class="py-2 col-md-6">
                        <label for="issue_date"  class="form-label" >Date of Issue *</label>
                        <input type="text" class="form-control form-control-lg" placeholder="YYYY-MM-DD" id="flatpickr-date" name="issue_date"/>

                        @error('issue_date')
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
