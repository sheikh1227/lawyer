@extends('layouts/contentLayoutMaster')

@section('title', 'User View')

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
  <!-- User Card & Plan Starts -->
  <div class="row">
    <!-- User Card starts-->
    <div class="col-xl-12 col-lg-8 col-md-7">
      <div class="card user-card">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
              <div class="user-avatar-section">
                <div class="d-flex justify-content-start">
                  <img
                    class="img-fluid rounded"
                    src="{{asset('images/avatars/7.png')}}"
                    height="104"
                    width="104"
                    alt="User avatar"
                  />
                  <div class="d-flex flex-column ml-1">
                    <div class="user-info mb-1">
                       <input type="hidden" id="user_id" value="{{$user->id}}">
                      <h4 class="mb-0">{{$user->name}}</h4>
                      <span class="card-text">{{$user->email}}</span>
                    </div>
                    <div class="d-flex flex-wrap">
                      @if(Auth::user()->role_id && Auth::user()->role_id == 10)
                        <a href="{{url('admin/profile/edit/')}}" class="btn btn-primary">Edit</a>
                      @elseif(Auth::user()->role_id && Auth::user()->role_id == 11)
                        <a href="{{url('customer/profile/edit/')}}" class="btn btn-primary">Edit</a>
                      @elseif(Auth::user()->role_id && Auth::user()->role_id == 12)
                        <a href="{{url('partner/profile/edit/')}}" class="btn btn-primary">Edit</a>
                        @elseif(Auth::user()->role_id && Auth::user()->role_id == 14)
                        <a href="{{url('partner/profile/edit/')}}" class="btn btn-primary">Edit</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center user-total-numbers">
                <div class="d-flex align-items-center mr-2">
                  <div class="color-box bg-light-primary">
                    <i data-feather="home" class="text-primary"></i>
                  </div>
                  <div class="ml-1">
                    <h5 class="mb-0">Adresse</h5>
                    <small>{{$user->Address}}</small>
                  </div>
                </div>
               
              </div>
            </div>
            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
              <div class="user-info-wrapper">
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="user" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Username</span>
                  </div>
                  <p class="card-text mb-0">{{$user->email}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="check" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Status</span>
                  </div>
                  <p class="card-text mb-0">{{$user->Status}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="star" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Role</span>
                  </div>
                  <p class="card-text mb-0">{{$user->role->RoleName}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="flag" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Country</span>
                  </div>
                  <p class="card-text mb-0">{{$user->Country}}</p>
                </div>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="phone" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                  </div>
                  <p class="card-text mb-0">{{$user->Contact}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card Ends-->

    <!-- Plan Card starts--><!-- /Plan CardEnds -->
  </div>
  <!-- User Card & Plan Ends -->


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
