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

  <!-- list section start -->
	
	
	
	 <div class="disabled-animation-ex">
              <!-- Button trigger modal -->
              
              <!-- Modal -->
              <div
                class="modal text-left"
                id="animation"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel6"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel6">Add New Contact</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class=" col-lg-12 col-md-12">
        <form class="add-new-user modal-content pt-0">
			
          <div class="modal-body flex-grow-1">
            <div class="form-group">
              <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
              <input
                type="text"
                class="form-control dt-full-name"
                id="basic-icon-default-fullname"
                placeholder="John Doe"
                name="user-fullname"
                aria-label="John Doe"
                aria-describedby="basic-icon-default-fullname2"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="basic-icon-default-uname">Telefon</label>
              <input
                type="text"
                id="basic-icon-default-uname"
                class="form-control dt-uname"
                placeholder="+4915901766553"
                aria-label="jdoe1"
                aria-describedby="basic-icon-default-uname2"
                name="user-name"
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
                name="user-email"
              />
              
            </div>
			   <label for="exampleFormControlTextarea1">Message</label>
            <div class="form-group">
             <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  placeholder="Textarea"
                ></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
	
	
	
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
		<div align="right">
		<button   type="button" class="btn btn-primary waves-effect waves-float waves-light" data-toggle="modal" data-target="#animation">
                Add Contact
              </button></div>
      <table class="user-list-table table">
        <thead class="thead-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <!-- <th>Subject</th> -->
            <th>Phone</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Modal to add new user starts-->
   
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
  <script src="{{ asset('js/scripts/pages/app-contact-list.js') }}"></script>
@endsection
