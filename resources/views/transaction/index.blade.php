@extends('layouts/layoutMaster')

@section('title', 'Transactions')

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


    .td-box{
      opacity: 0.79 !important;
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
        <h5>Transactions</h5>

        <div class="d-flex w-50 gap-2 justify-content-end"">
          <a href="{{ route('transaction.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
            <i class='bx bx-plus bx-sm'></i>
            <span>Local</span>
          </a>

          <a href="{{ route('partnersTransaction.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
            <i class='bx bx-plus bx-sm'></i>
            <span>Partners</span>
          </a>
        </div>

      </div>

          <div class="table-responsive text-nowrap px-4 py-4">

            <table class="table py-2" id="myTable">

              <thead>
                  <th>ID</th>
                  <th>To & From</th>
                  <th>Account Affected</th>
                  <th>By</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Time</th>
                  <th>Action</th>
              </thead>

              <tbody class="tbody">

                @foreach ($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->id }}</td>
                  <td>{{ $transaction->payment_to_from}}</td>
                  <td>
                    @if( $transaction->type == "Loan")
                      <span class="badge bg-label-warning">{{ $transaction->type}}</span>
                    @elseif($transaction->type == "Credit")
                      <span class="badge bg-label-danger">{{ $transaction->type}}</span>
                    @else
                      <span class="badge bg-label-success">{{ $transaction->type}}</span>
                    @endif
                  </td>
                  <td>{{ $transaction->using}}</td>
                  <td>{{ $transaction->amount}}</td>
                  <td>
                    @if($transaction->status == "Rejected")
                      <span class="badge bg-label-danger">{{ $transaction->status}}</span>
                    @elseif($transaction->status == "Pending")
                      <span class="badge bg-label-info">{{ $transaction->status}}</span>
                    @else
                      <span class="badge bg-label-success">{{ $transaction->status}}</span>
                    @endif
                  </td>
                  <td>{{ $transaction->transaction_date_time}}</td>

                  <td>

                    <div class="dropdown">

                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('transaction.edit', $transaction->id) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>

                        <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
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


