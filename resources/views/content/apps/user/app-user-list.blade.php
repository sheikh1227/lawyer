@extends('layouts/contentLayoutMaster')

@section('title', 'User List')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
<!-- users list start -->
<section class="app-user-list">
  <!-- users filter start -->
  <div class="card">
    <h5 class="card-header">Search Filter</h5>
    <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
      <div class="col-md-4 user_role"></div>
      <div class="col-md-4 user_plan"></div>
      <div class="col-md-4 user_status"></div>
    </div>
  </div>
  <!-- users filter end -->
  <!-- list section start -->
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
      <table class="user-list-table table">
        <thead class="thead-light">
          <tr>
            <th></th>
            <th>User</th>
            <th>Email</th>
            <th>Role</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Modal to add new user starts-->
    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
    
      <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0" id="validate_form">
          @csrf
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">New User</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div id="error_message"></div>
            <div class="form-group">
              <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="basic-icon-default-fullname"
                placeholder="John Doe"
                name="name"
                aria-label="John Doe"
                aria-describedby="basic-icon-default-fullname2"
                data-parsley-required="true"  
                data-parsley-trigger="change"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="basic-icon-default-uname">Telefon</label>
              <input
                type="number"
                id="basic-icon-default-uname"
                class="form-control dt-uname"
                placeholder="+4915901766553"
                aria-label="jdoe1"
                aria-describedby="basic-icon-default-uname2"
                name="Contact"
                data-parsley-required="true"  
                data-parsley-trigger="change"
                data-parsley-type-message="only numbers" 
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="basic-icon-default-email">Email</label>
              <input
                type="text"
                id="basic-icon-default-email"
                class="form-control dt-email"
                placeholder="john.doe@example.com"
                aria-label="john.doe@example.com"
                aria-describedby="basic-icon-default-email2"
                name="email"
                data-parsley-required="true"  
                data-parsley-trigger="change"
              />
              <small class="form-text text-muted"> You can use letters, numbers & periods </small>
            </div>

            <div class="form-group">
              <label class="form-label" for="basic-icon-default-email">Password</label>
              <input
                type="password"
                id="basic-icon-default-password"
                class="form-control dt-email"
                placeholder="Laywer@123"
                aria-label="Laywer@123"
                aria-describedby="basic-icon-default-password"
                name="password"
                data-parsley-required="true"  
                data-parsley-trigger="change"
              />
              <small class="form-text text-muted"> You can use letters, numbers  </small>
            </div>
            <div class="form-group">
              <label class="form-label" for="user-role">User Role</label>
              <select id="role_id" name="role_id" class="form-control" data-parsley-required="true" data-parsley-trigger="change">
                @foreach($roles as $role)
                <option value="{{$role->role_id}}">{{ $role->RoleName}}</option>
                @endforeach
              </select>
            </div>
           
            <button type="submit" id="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal to add new user Ends-->
  </div>
  <!-- list section end -->
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-list.js')) }}"></script>
@endsection
