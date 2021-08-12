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
                  <div class="d-flex flex-column ml-1">
                    <div class="user-info mb-1">
                      <h4 class="mb-0">{{$contact->Name}}</h4>
                      <span class="card-text">{{$contact->Email}}</span>
                    </div>
                    <div class="d-flex flex-wrap">
       

                      @if(!empty($contact->case->CaseID))

                          <h4 class="mb-0">ID : {{$contact->case->CaseID}}</h4>
                          <a href="{{route('admin-contact-case', $contact->case->CaseID)}}" class="btn btn-outline-primary waves-effect ml-1">view</a>
                          
                      @else
                        <!-- <a href="{{url('app/user/view')}}" class="btn btn-primary">Creat Case</a> -->
                        <!-- <a href="{{route('admin-conver-into-case', $contact->ContactID)}}" class="btn btn-primary ">Creat Case</a> -->
                        <a data-toggle="modal" data-target="#large" class="btn btn-primary ">Creat Case</a>

                      @endif
                      
                      <button type="button" class="btn btn-outline-danger ml-1" onclick="open_delete('{{$contact->ContactID}}')" data-toggle="modal" data-target="#danger">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
              <div class="user-info-wrapper">
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="user" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Name</span>
                  </div>
                  <p class="card-text mb-0">{{$contact->Name}}</p>
                </div>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="phone" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Telephone</span>
                  </div>
                  <p class="card-text mb-0">{{$contact->PhoneNo}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="mail" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">E-Mail</span>
                  </div>
                  <p class="card-text mb-0">{{$contact->Email}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">

                  </div>
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
  <p><!-- User Card & Plan Ends -->

   <!-- Basic ListGroups start -->
   <section id="basic-list-group">
    <div class="row match-height">
      <div class="col-lg-7 col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Contact Message</h4>
          </div>
          <div class="card-body">
            <p class="card-text">
              {{$contact->Subject}}
            </p>

          </div>
        </div>

        <h4 class="card-title">Contact Comments</h4>
          @foreach($Notes as $note)
          <div class="card">
            <div class="card-body">

              <p class="card-text">
              Comments :  <b> {{$note->Notes}}</b> 
              </p> 
              <p class="card-text">
                Added At :<b> {{date("F j, Y, g:i a", strtotime($note->CreatedAt)) }} </b>
              </p>

            </div>
          </div>
          @endforeach
      </div>
      <div class="col-lg-5 col-md-12">
        <div class="card">
       <!--    <div class="card-header">
            <h4 class="card-title">Add Comment</h4>
          </div> -->
          <div class="card-body">
            <form action="{{route('admin-contact-notes-save',$contact->ContactID)}}" method="post"> 
              @csrf
            <div class="row">
              <div class="col-12">
                <input type="hidden" name="ContactID" id="ContactID" value="{{$contact->ContactID}}">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1"><h4 class="card-title">Add Comment</h4></label>
                  <textarea
                  class="form-control"
                  name="Notes"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  placeholder="Add Comment"
                  required
                  ></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Basic ListGroups end -->
  <div class="d-inline-block">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
    class="modal fade modal-danger text-left"
    id="danger"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel120"
    aria-hidden="true"
    >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel120">Delete Contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this contact?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger custom_delete" onclick="delete_record(this)" data-dismiss="modal">Yes</button>
        </div>
      </div>
    </div>
  </div>
</div>



  <div
  class="modal fade text-left"
  id="large"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myModalLabel17"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form id="validate_form">
        @csrf
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17"> Create Case </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <section class="full-editor">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <div class="card-body">
                <div id="error_message"></div>
                <div class="row custom_row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="Name">Name</label>
                      <input type="text" class="form-control" placeholder="Name" value="{{$contact->Name}}" name="name" id="username" aria-invalid="false" data-parsley-required="true"  data-parsley-trigger="change">
                    </div>
                    
                    <div class="form-group">
                      <label for="email">E-Mail</label>
                      <input type="text" class="form-control" placeholder="Email" value="{{$contact->Email}}" name="email" id="email" aria-invalid="false" data-parsley-required="true"  data-parsley-trigger="change">
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" placeholder="Address" value="" name="address" id="address" aria-invalid="false" >
                    </div>

                    <div class="form-group">
                      <label for="Pincode">Pincode</label>
                      <input type="text" class="form-control" placeholder="Pincode" value="" name="pincode" id="Pincode" aria-invalid="false" >
                    </div>
                 
                  </div>
                  <div class="col-md-6">


                    <div class="form-group">
                      <label for="PhoneNo">Telephone</label>
                      <input type="text" class="form-control" placeholder="PhoneNo" value="{{$contact->PhoneNo}}" name="contact" id="PhoneNo" aria-invalid="false" data-parsley-required="true"  data-parsley-trigger="change">
                    </div>

                 
                      <div class="form-group">
                        <label for="Laywer">Laywer</label>
                        <select 
                          class="form-control" 
                          name="LaywerID" 
                          id="Laywer" 
                          data-parsley-required="true"  
                          data-parsley-trigger="change"
                        > 
                          <option value=""> - Select Laywer -</option>
                          @foreach($users as $user)
                          <option value="{{$user->id}}"> {{ $user->name }} ( {{ $user->email }} ) </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" placeholder="City" value="" name="city" id="city" aria-invalid="false" >
                      </div>

                      <div class="form-group">
                        <label for="CaseTypeID">Type</label>
                        <select 
                          class="form-control" 
                          name="CaseTypeID" 
                          id="CaseTypeID" 
                          data-parsley-required="true"  
                          data-parsley-trigger="change"
                        > 
                          <option value=""> - Select Type -</option>
                          @foreach($type as $typ)
                          <option value="{{$typ->CaseTypeID}}"> {{ $typ->CaseTypeName }} </option>
                          @endforeach
                        </select>
                      </div>

                  </div>
                
                  </div>
                </div>
            </div>
          </div>
        </div>
      
    </section>
    
    <div class="modal-footer">
      <button type="submit" id="submit" class="btn btn-primary" > Create </button>
    </div>
    </form>
  </div>
</div>
</div>
</div>


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

<script type="text/javascript">
  function open_delete(ID) {
    $('.custom_delete').attr('id', ID);
  }

  function delete_record(button) {
    var ID = $(button).attr('id');
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
    });
    $.ajax({
      type: "DELETE",
      url: '{{ url("admin/contact/delete/")}}/'+ID,
      // method:"POST",
      data: {
          "_token": "{{ csrf_token() }}",
          
          },
      success:function(data)
      { 
        const obj = JSON.parse(data);
        alert(obj.msg)
        if(obj.status =='success'){
           window.location.href = '{{url("admin/contact")}}';
        }

      },
      error:function(data){
        alert("Error: Try Again ");
      }
    });
   
  }


$(function () {

  $('#validate_form').parsley();
  /*create case*/
    var ContactID = $('#ContactID').val();
    $('#validate_form').on('submit', function(event){
     event.preventDefault();
    $('#validate_form').parsley();
    if($('#validate_form').parsley().isValid())
    {
    $('#validate_form').parsley();
    $('#modals-slide-in').modal('show');

    $.ajax({
      url: '{{ url("admin/create-case") }}/'+ContactID,
      method:"POST",
      //data:$(this).serialize(),
      data:new FormData(this),
      dataType:"json",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function()
      {
       $('#submit').attr('disabled', 'disabled');
       $('#submit').val('Submitting...');
      },
      success:function(data)
      {
         $('#modals-slide-in').modal('show');
        //console.log(data);
        $('#validate_form')[0].reset();
        $('#validate_form').parsley().reset();
        $('#submit').attr('disabled', false);
        $('#submit').val('Submit');
        //alert(data.success);
        if(data.success){
          //alert(data.success);
          var errorsHtml = '<div class="alert alert-success"><ul>';
          $.each(data.success,function (k,v) {
                 errorsHtml += '<li>'+ v + '</li>';
          });
          errorsHtml += '</ul></di>';
          $('#error_message').html(errorsHtml);
          //appending to a <div id="error_message"></div> inside form 
          $('#error_message').hide(2000);
          window.location.href = '{{url("admin/case")}}/'+data.CaseID;
        }else{
          //console.log(data.error);
          var errorsHtml = '<div class="alert alert-danger"><ul>';
          $.each(data.error,function (k,v) {
                 errorsHtml += '<li>'+ v + '</li>';
          });
          errorsHtml += '</ul></di>';
          $('#error_message').html(errorsHtml);
          //appending to a <div id="error_message"></div> inside form 
        }
      }
     });
    }
    });
});

</script>

@endsection
