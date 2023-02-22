@extends('layouts/layoutMaster')

@section('title', 'Labour')

@section('style')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <style>
    .tbody tr td{
      height: 40px !important;
    }

    @media screen and (max-width: 580px){
      .table-header{
        position: relative;
      }

      .table-header-button span{
        display: none;
      }
    }
    .app-brand-link{
      height: 70px !important;
    }

    .app-brand-logo{
      height: 50px !important;
    }




  </style>

@endsection


@section('page-script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready( function () {
         $('#myTable').DataTable({
             "responsive": true,
         });

      } );
    </script>

@endsection


@section('content')

  <div class="card">

      <div class="card-header d-flex justify-content-between align-items-center table-header">
        <h5>Labours</h5>

        <a href="{{ route('labour.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
          <i class='bx bx-plus bx-sm'></i>
          <span>New Labour</span>
        </a>
      </div>

          <div class="table-responsive text-nowrap px-4 py-4">

            <table class="table py-2" id="myTable">

              <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Identity Number</th>
                  <th>Phone</th>
                  <th>Age</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Work Type</th>
                  <th>Joining Date</th>
                  <th>Salary</th>
                  <th>Action</th>
              </thead>

              <tbody class="tbody">

                @foreach ($labours as $labour)
                <tr>
                  <td>{{ $labour->id }}</td>
                  <td>{{ $labour->first_name }} {{ $labour->last_name }}</td>
                  <td>{{ $labour->idn_number }}</td>
                  <td>{{ $labour->phone }}</td>
                  <td>{{ $labour->age }}</td>
                  <td>{{ $labour->address }}</td>
                  <td>{{ $labour->city }}</td>
                  <td>{{ $labour->work_type }}</td>
                  <td>{{ $labour->join_date }}</td>
                  <td>{{ $labour->salary }}</td>

                  <td>

                    <div class="dropdown">

                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('labour.edit', $labour->id) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>

                        <form action="{{ route('labour.destroy', $labour->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Delete</button>
                        </form>
                      </div>

                    </div>

                  </td>

              </tr>
              @endforeach

            </tbody>

        </table>


      </div>

  </div>



@endsection


