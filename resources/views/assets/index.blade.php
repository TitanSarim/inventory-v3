@extends('layouts/layoutMaster')

@section('title', 'Partner')

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
        <h5>Assets</h5>

        <a href="{{ route('assets.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
          <i class='bx bx-plus bx-sm'></i>
          <span>New Asset</span>
        </a>
      </div>

          <div class="table-responsive text-nowrap px-4 py-4">

            <table class="table py-2" id="myTable">

              <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Payment Type</th>
                  <th>Amount</th>
                  <th>Buying Year</th>
                  <th>Buying From</th>
                  <th>Action</th>
              </thead>

              <tbody class="tbody">

                @foreach ($assets as $asset)
                <tr>
                  <td>{{ $asset->id }}</td>
                  <td>{{ $asset->name}}</td>
                  <td>{{ $asset->payment_type}}</td>
                  <td>{{ $asset->amount }}</td>
                  <td>{{ $asset->buying_year }}</td>
                  <td>{{ $asset->buying_from }}</td>

                  <td>

                    <div class="dropdown">

                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('assets.edit', $asset->id) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>

                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST">
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


