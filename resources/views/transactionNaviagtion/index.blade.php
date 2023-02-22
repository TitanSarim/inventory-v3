@extends('layouts/layoutMaster')

@section('title', 'Transactions')

@section('content')


<div class="card py-4 px-4">

  <small class="text-dark font-weight-normal h4">Select Transaction Type</small>
  <div class="row mt-3">
    <div class="d-grid gap-4 col-lg-6 mx-auto">
      <a href="{{ route('transaction.create')}}" class="btn btn-primary btn-lg" type="button">Local Transactions</a>
      <a href="{{ route('partnersTransaction.create')}}" class="btn btn-primary btn-lg" type="button">Partners Transactions</a>
    </div>
  </div>

</div>


@endsection
