@extends('layouts/contentLayoutMaster')

@section('title', 'Case List')

@section('vendor-style')
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css'))}}">
@endsection
@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
<section class="app-user-view">


  <!-- User Invoice Starts-->
  <div class="row invoice-list-wrapper">
    <div class="col-12">
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="invoice-list-table table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th><i data-feather="trending-up"></i></th>
                <th>Client</th>
                <th>Laywer Name</th>
                <th class="text-truncate"> Date</th>
                <th>Status</th>
                <th> Status</th>
                <th>Case Type</th>
                <th class="cell-fit">Actions</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /User Invoice Ends-->
</section>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/extensions/moment.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js'))}}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
