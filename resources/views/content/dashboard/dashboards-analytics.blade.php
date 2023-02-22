@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}">
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<style>
  .app-brand-link{
      height: 70px !important;
    }

    .app-brand-logo{
      height: 50px !important;
    }
</style>

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')



  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

  <script>
    var TotalPurchaseChart = @json($TotalPurchaseChart);
    var purchaseMonths = @json($months);
    var PurchaseMonthsCount = @json($monthsCount);
  </script>

  <script>
    var TotalSalesChart = @json($TotalSalesChart);
    var monthsSales = @json($monthsSales);
    var monthsCountSales = @json($monthsCountSales);
  </script>

  <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
  <script src="/js/dashboardCharts.js"></script>

  <script>
    $(document).ready( function () {
       $('#myTable').DataTable({
           "lengthChange": false,
           "searching": false,
           "info": false,
           "colReorder": true,
           "responsive": true
       });
    } );

    $(document).ready( function () {
       $('#myTable2').DataTable({
           "lengthChange": false,
           "searching": false,
           "info": false,
           "colReorder": true,
           "responsive": true
       });
    } );

    $(document).ready( function () {
       $('#myTable3').DataTable({
           "lengthChange": false,
           "searching": false,
           "info": false,
           "colReorder": true,
           "responsive": true
       });
    } );
  </script>


@endsection

@section('content')

<div class="row">
  <!-- Sales Overview -->
  <div class="col-lg-6 mb-4">
    <div class="row">

      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Revenue</span>
            <h3 class="card-title mb-2">${{ $totalRevenue }}</h3>
            @if( $pecentage > 0 )
              <small class="text-success fw-semibold"> <i class='bx bx-up-arrow-alt'></i>{{ $pecentage }}%</small>
            @else
              <small class="text-danger fw-semibold "> <i class='bx bx-down-arrow-alt'></i>{{ $pecentage }}%</small>
            @endif

          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span>Today Purchase</span>
            <h3 class="card-title text-nowrap mb-1">${{ $purchaseCount }}</h3>
            <small class="text-success fw-semibold">
              @if( $purchaseCount > $purchaseCounty )
                <i class='bx bx-up-arrow-alt'></i>
              @else
                <i class='bx bx-down-arrow-alt text-danger'></i>
              @endif
              <span class="text-secondary">Yesterday ${{ $purchaseCounty }}</span>
            </small>
          </div>
        </div>
      </div>

      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/paypal.png')}}" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span class="d-block mb-1">Today Sales</span>
            <h3 class="card-title text-nowrap mb-2">${{ $invoiceCount }}</h3>
            <small class="text-success fw-semibold">
              @if( $invoiceCount > $invoiceCounty )
                <i class='bx bx-up-arrow-alt'></i>
              @else
                <i class='bx bx-down-arrow-alt text-danger'></i>
              @endif
              <span class="text-secondary">Yesterday ${{ $invoiceCounty }}</span>
            </small>
          </div>
        </div>
      </div>

      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Expenses</span>
            <h3 class="card-title mb-2">${{ $totalExpenses }}</h3>
            @if( $expensePer > 0 )
              <small class="text-danger fw-semibold"> <i class='bx bx-up-arrow-alt'></i>+{{ $expensePer }}%</small>
            @else
              <small class="text-success fw-semibold "> <i class='bx bx-down-arrow-alt'></i>-{{ $expensePer }}%</small>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Sales Overview -->


  <!-- Earning Reports -->
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
        <div class="card-title mb-0">
          <h5 class="mb-0">Account Report</h5>
          <small class="text-muted">Overall Earnings Overview</small>
        </div>
        <!-- </div> -->
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-4 d-flex flex-column align-self-end">
            <div class="d-flex gap-2 align-items-center mb-2 pb-1 flex-wrap">
              <h1 class="mb-0">${{ $totalRevenue }}</h1>
              @if($pecentage > 0)
                <div class="badge rounded bg-label-success">{{ $pecentage }}%</div>
              @else
                <div class="badge rounded bg-label-danger">{{ $pecentage }}%</div>
              @endif
            </div>
            <small class="text-muted">Your Capital account report of this years is shown here</small>
          </div>
          <div class="col-12 col-md-8">
            <div id="weeklyEarningReports"></div>
          </div>
        </div>
        <div class="border rounded p-3 mt-2">
          <div class="row gap-4 gap-sm-0">

            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-primary p-1"><i class="ti ti-currency-dollar ti-sm"></i></div>
                <h6 class="mb-0">Earnings</h6>
              </div>
              <h4 class="my-2 pt-1">${{$totalInvoices}}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-danger p-1"><i class="ti ti-brand-paypal ti-sm"></i></div>
                <h6 class="mb-0">Expense</h6>
              </div>
              <h4 class="my-2 pt-1">${{$totalExpenses}}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-info p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                <h6 class="mb-0">Profit</h6>
              </div>
              <h4 class="my-2 pt-1">${{$totalRevenue}}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Earning Reports -->

    <!-- Total Earning -->
  <div class="col-12">

    <div class="col-12 col-xl-4 mb-4 col-md-6">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                  <div class="card-title">
                    <h5 class="text-nowrap mb-2">Sales Report</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2023</span>
                  </div>
                  <div class="mt-sm-auto">
                    <h3 class="mb-0">${{ $totalSales }}</h3>
                  </div>
                </div>
                <div id="profileReportChart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-xl-4 mb-4 col-md-6">
      <div class="row">
      <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
              <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                <div class="card-title">
                  <h5 class="text-nowrap mb-2">Purchase Report</h5>
                  <span class="badge bg-label-warning rounded-pill">Year 2023</span>
                </div>
                <div class="mt-sm-auto">
                  <h3 class="mb-0">${{ $totalBuy }}</h3>
                </div>
              </div>
              <div id="PurchaseReportChart"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

  </div>
    <!--/ Total Earning -->

  <!-- Unpaid Invoices -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Unpaid Invoices</h5>
        </div>

        <div class="dropdown">
          <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="{{ route('invoice.index') }}">View All</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">${{ $unpaidInvoicesTotal }}</h2>
          </div>
        </div>

        <div class="table-responsive text-nowrap px-0 py-2" >
          <table id="myTable" class="table py-2">

              <thead>
                      <th>Invoice Id</th>
                      <th>Customer Name</th>
                      <th>Status</th>
              </thead>

              <tbody>
              @foreach ($unpaidInvoices as $unpaidInvoice)
                  <tr>
                          <td>{{$unpaidInvoice->invoice_no}}</td>
                          <td>{{$unpaidInvoice->customer_name}}</td>
                          <td>
                              <span class="badge bg-label-danger">unpaid</span>
                          </td>
                  </tr>
              @endforeach
              </tbody>

          </table>
      </div>

      </div>
    </div>
  </div>
  <!--/ unpaid invoices -->



  <!-- Unpaid Purchases -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Unpaid Purchases</h5>
        </div>

        <div class="dropdown">
          <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="{{ route('purchase.index') }}">View All</a>
          </div>
        </div>


      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">${{ $unpaidPurchasesTotal }}</h2>
          </div>
        </div>

        <div class="dashboard-table-card" class="table-responsive text-nowrap px-0 py-2" >

          <table id="myTable2" class="table py-2">

              <thead>
                      <th>Purchase Id</th>
                      <th>Supplier Name</th>
                      <th>Status</th>
              </thead>

              <tbody>
              @foreach ($unpaidPurchases as $unpaidPurchase)
                  <tr>
                          <td>{{$unpaidPurchase->purchase_no}}</td>
                          <td>{{$unpaidPurchase->supplier_name}}</td>
                          <td>
                              <span class="badge bg-label-danger">unpaid</span>
                          </td>
                  </tr>
              @endforeach
              </tbody>

          </table>



        </div>


      </div>
    </div>
  </div>
  <!--/ Unpaid Purchases  -->

  <!-- unpaid Expenses -->
  <div class="col-xl-4 col-md-6 order-2 order-lg-1">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Pending Expenses</h5>
        </div>

        <div class="dropdown">
          <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="{{ route('expense.index') }}">View All</a>
          </div>
        </div>


      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">${{ $unpaidExpensesTotal }}</h2>
          </div>
        </div>

        <div class="dashboard-table-card" class="table-responsive text-nowrap px-0 py-2" >

          <table id="myTable3" class="table py-2">

              <thead>
                      <th>Expense Id</th>
                      <th>Expense Name</th>
                      <th>Status</th>
              </thead>

              <tbody>
              @foreach ($unpaidExpenses as $unpaidExpense)
                  <tr>
                          <td>{{$unpaidExpense->id}}</td>
                          <td>{{$unpaidExpense->name}}</td>
                          <td>
                              <span class="badge bg-label-danger">unpaid</span>
                          </td>
                  </tr>
              @endforeach
              </tbody>

          </table>



        </div>

      </div>
    </div>
  </div>
  <!--/ unpaid Expenses -->

</div>

@endsection
