@extends('layouts/layoutMaster')

@section('title', 'Crm')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

  <style>


  </style>

@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-crm.js')}}"></script>
@endsection

@section('content')
<div class="row">



  <!-- Earning Reports Tabs-->
  <div class="col-12 col-xl-8 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-0">Earning Reports</h5>
          <small class="text-muted">Yearly Earnings Overview</small>
        </div>

      </div>
      <div class="card-body">
        <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id" aria-controls="navs-orders-id" aria-selected="true">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Sales</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sales-id" aria-controls="navs-sales-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-chart-bar ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Profit</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profit-id" aria-controls="navs-profit-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Inome</h6>
            </a>
          </li>


        </ul>
        <div class="tab-content p-0 ms-0 ms-sm-2">
          <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
            <div id="earningReportsTabsOrders"></div>
          </div>
          <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
            <div id="earningReportsTabsSales"></div>
          </div>
          <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
            <div id="earningReportsTabsProfit"></div>
          </div>
          <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
            <div id="earningReportsTabsIncome"></div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Sales last 6 months -->
  <div class="col-md-6 col-xl-4 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-0">Sales</h5>
          <small class="text-muted">Last 6 Months</small>
        </div>

      </div>
    </div>
  </div>


  <!-- Total Profit -->

      <div class="col-xl-2 col-md-4 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-currency-dollar ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Total Profit</h5>
            <small class="text-muted">Last week</small>
            <p class="mb-2 mt-1">1.28k</p>
            <div class="pt-1">
              <span class="badge bg-label-secondary">-12.2%</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Sales -->
      <div class="col-xl-2 col-md-4 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-chart-bar ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Total Sales</h5>
            <small class="text-muted">Last week</small>
            <p class="mb-2 mt-1">$4,673</p>
            <div class="pt-1">
              <span class="badge bg-label-secondary">+25.2%</span>
            </div>
          </div>
        </div>
      </div>



    <!-- Revenue Growth -->
    <div class="col-xl-6 col-md-8 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <h5 class="card-title m-0 me-2">Last Transaction</h5>

        </div>
        <div class="table-responsive">
          <table class="table table-borderless border-top">
            <thead class="border-bottom">
              <tr>
                <th>CARD</th>
                <th>DATE</th>
                <th>STATUS</th>
                <th>TREND</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-3">
                      <img src="{{asset('assets/img/icons/payments/visa-img.png')}}" alt="Visa" height="30">
                    </div>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">*4230</p><small class="text-muted">Credit</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-semibold">Sent</p>
                    <small class="text-muted text-nowrap">17 Mar 2022</small>
                  </div>
                </td>
                <td><span class="badge bg-label-success">Verified</span></td>
                <td>
                  <p class="mb-0 fw-semibold">+$1,678</p>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-3">
                      <img src="{{asset('assets/img/icons/payments/master-card-img.png')}}" alt="Visa" height="30">
                    </div>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">*5578</p><small class="text-muted">Credit</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-semibold">Sent</p>
                    <small class="text-muted text-nowrap">12 Feb 2022</small>
                  </div>
                </td>
                <td><span class="badge bg-label-danger">Rejected</span></td>
                <td>
                  <p class="mb-0 fw-semibold">-$839</p>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-3">
                      <img src="{{asset('assets/img/icons/payments/american-express-img.png')}}" alt="Visa" height="30">
                    </div>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">*4567</p><small class="text-muted">Credit</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-semibold">Sent</p>
                    <small class="text-muted text-nowrap">28 Feb 2022</small>
                  </div>
                </td>
                <td><span class="badge bg-label-success">Verified</span></td>
                <td>
                  <p class="mb-0 fw-semibold">+$435</p>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-3">
                      <img src="{{asset('assets/img/icons/payments/visa-img.png')}}" alt="Visa" height="30">
                    </div>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">*5699</p><small class="text-muted">Credit</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-semibold">Sent</p>
                    <small class="text-muted text-nowrap">8 Jan 2022</small>
                  </div>
                </td>
                <td><span class="badge bg-label-secondary">Pending</span></td>
                <td>
                  <p class="mb-0 fw-semibold">+$2,345</p>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="me-3">
                      <img src="{{asset('assets/img/icons/payments/visa-img.png')}}" alt="Visa" height="30">
                    </div>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">*5699</p><small class="text-muted">Credit</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-semibold">Sent</p>
                    <small class="text-muted text-nowrap">8 Jan 2022</small>
                  </div>
                </td>
                <td><span class="badge bg-label-danger">Rejected</span></td>
                <td>
                  <p class="mb-0 fw-semibold">-$234</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>



</div>


@endsection
