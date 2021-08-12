@extends('layouts/contentLayoutMaster')

@section('title', 'User View')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css'))}}">
@endsection
@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
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
                      <h4 class="mb-0">ID : {{$case->CaseID}}</h4>
                      <input type="hidden" id="CaseID" value="{{$case->CaseID}}">
                      <span class="card-text">{{$case->user->email}}</span>
                    </div>
                    <div class="d-flex flex-wrap">
                      <a data-toggle="modal" data-target="#large_edit" class="btn btn-primary">Edit</a>
                      @if($case->Status == 'Open')
                      <button class="btn btn-outline-danger ml-1" onclick="open_delete('{{$case->CaseID}}')" data-toggle="modal" data-target="#danger" >Close case</button>
                      @elseif($case->Status == 'Hold' || $case->Status == 'Close' )
                      <button class="btn btn-outline-danger ml-1" onclick="delete_case('{{$case->CaseID}}')" data-toggle="modal" data-target="#delete" >Delete case</button>

                      @endif
                      <button class="btn btn-outline-primary ml-1" data-toggle="modal" data-target="#large"> Send E-Mail</button>
                      
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
                    <small>
                      @if($case->user->Address)
                        {{$case->user->Address}} {{$case->user->Address1}}  {{$case->user->City}} {{$case->user->State}} {{$case->user->Country}} {{$case->user->Postcode}}
                      @else
                        NA
                      @endif  </small>
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
                  <p class="card-text mb-0">{{$case->user->name}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="check" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Case Status</span>
                  </div>
                  <p class="card-text mb-0">{{$case->Status}}</p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="star" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Case type</span>
                  </div>
                  <p class="card-text mb-0">
                      @if($case->type->CaseTypeID)
                        {{$case->type->CaseTypeName}}
                      @else
                          NA
                      @endif


                  </p>
                </div>
                <div class="d-flex flex-wrap my-50">
                  <div class="user-info-title">
                    <i data-feather="flag" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Country</span>
                  </div>
                  <p class="card-text mb-0">
                     @if($case->user->Country)
                       {{$case->user->Country}}
                      @else
                          NA
                      @endif
                  </p>
                </div>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="phone" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                  </div>
                  <p class="card-text mb-0">
                     @if($case->user->Contact)
                       {{$case->user->Contact}}
                      @else
                          NA
                      @endif
                  </p>
                </div>
                 <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                    <i data-feather="user" class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Laywer</span>
                  </div>
                  <p class="card-text mb-0">{{$case->laywer->name}}</p>
                </div>
                <div class="d-flex flex-wrap">
                  <div class="user-info-title">
                   
                    <i data-feather='watch' class="mr-1"></i>
                    <span class="card-text user-info-title font-weight-bold mb-0">Created At</span>
                  </div>
                  <p class="card-text mb-0"> {{date('d.m.Y', strtotime($case->CreatedAt ))}} </p>
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
    
   <!-- Basic Tables start -->
   <div class="row" id="basic-table">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex flex-wrap">
            <a  class="btn btn-primary" data-toggle="modal" data-target="#primary">Add Record</a></div>
          </div>
          <!-- Modal -->
          
          
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Date</th>
                  <th>Record</th>
                  <th></th>
                  <th>Share</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($RecordList as $key => $list)
                  <tr>
                    <td>
                      @php 
                        $url = url('images/case_records/'.$list->File);
                      @endphp
                    @if($list->Type !='Email')
                      <i data-feather='file' data-toggle="modal" data-target="#view_records" onclick="show_details('Record','{{$list->Subject}}', '{{$list->Content}}', '{{$url}}', '{{$list->Email}}')"></i>
                    @else
                      <p data-toggle="modal" data-target="#view_records"  onclick="show_details('Email','{{$list->Subject}}', '{{$list->Content}}', '{{$url}}','{{$list->Email}}')"><i data-feather='mail' ></i></p>
                    @endif
                     
                    </td>
                    <td>{{date('d.m.Y', strtotime($list->CreatedAt ))}}</td>
                    <td>{{$list->Subject}}</td>
                    <td></td>
                    <td>  <div class="custom-control custom-switch custom-switch-primary">
                    <input type="checkbox" class="custom-control-input" id="customSwitch{{$key}}" onclick="share_toggle('{{$list->RecordID}}')" @if($list->IsShare) checked @endif />
                    <label class="custom-control-label" for="customSwitch{{$key}}">
                      <span class="switch-icon-left"><i data-feather="check"></i></span>
                      <span class="switch-icon-right"><i data-feather="x"></i></span>
                    </label>
                    </div></td>
                  
                  
                 </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Basic Tables end -->
  <div
  class="modal fade text-left modal-primary"
  id="primary"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myModalLabel160"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form id="add_records">
        @csrf
         <input type="hidden" name="UserID" value="{{$case->user->id}}">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel160">Add Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
         
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
               <div id="error_message"></div>
              

              <div class="input-group mb-2">
               
                <input
                type="text"
                class="form-control"
                placeholder="Subject"
                aria-label="Subject"
                aria-describedby="basic-addon1"
                name="subject"
                data-parsley-required="true"  
                data-parsley-trigger="change"
                />
              </div>

              
              

              <div class="input-group">
                <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
                placeholder="Textarea"
                name="content"
                data-parsley-required="true"  
                data-parsley-trigger="change"
                ></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <input type="file" name="file" class="form-control-file" id="basicInputFile" />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-primary" >Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal-size-lg d-inline-block">
 
  
  <!-- Modal -->
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
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">Send Email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="send_email_case">
        @csrf
      <section class="full-editor">
        <div id="error_message"></div>
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <div class="card-body">
               <div class="input-group mb-2">
                 
                <input
                type="text"
                class="form-control"
                placeholder="To: David Test"
                aria-label="to David Test"
                aria-describedby="basic-addon1"
                data-parsley-required="true"  
                data-parsley-trigger="change"
                value="{{$case->user->email}}"
                readonly="readonly"
                name="email"
                />
                <input type="hidden" name="UserID" value="{{$case->user->id}}">
              </div>
              <div class="input-group mb-2">
               
                <input
                type="text"
                class="form-control"
                placeholder="Subject"
                aria-label="Subject"
                aria-describedby="basic-addon1"
                data-parsley-required="true"  
                data-parsley-trigger="change"
                name="subject"
                />
              </div>

              <textarea class="textarea " name="content" style="display: none;"></textarea>
              
              <div class="row">
                <div class="col-sm-12">
                  <div id="full-wrapper">
                    <div id="full-container">
                      <div class="editor">
                        
                       
                        
                        
                        <p class="card-text"><br /></p>
                        <p class="card-text"><br /></p>
                        <p class="card-text"><br /></p>
                        <p class="card-text"><br /></p>
                        <p class="card-text"><br /></p>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <input type="file" name="file" class="form-control-file" id="basicInputFile"  />
        </div>
      </div>
    </section>
    <div class="modal-footer">
      <button type="submit" id="submit" class="btn btn-primary" >Sende E-Mail</button>
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
          <h5 class="modal-title" id="myModalLabel120">Close Case</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to Close this Case?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger custom_delete" onclick="delete_record(this)" data-dismiss="modal">Yes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- delete pop up -->
  <div class="d-inline-block">
      <!-- Button trigger modal -->

      <!-- Modal -->
      <div
      class="modal fade modal-danger text-left"
      id="delete"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel120"
      aria-hidden="true"
      >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel120">Delete Case</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to Close this Case?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger c_delete" onclick="case_delate(this)" data-dismiss="modal">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- delete pop up end -->

  <div
  class="modal fade text-left"
  id="large_edit"
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
        <h4 class="modal-title" id="myModalLabel17"> Update Case </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <section class="full-editor">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <div class="card-body">
                <div id="error_message_custom"></div>
                <div class="row custom_row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="Name">Name</label>
                      <input type="hidden" name="UserID" value="{{$case->user->id}}">
                      <input type="text" class="form-control" placeholder="Name" value="{{$case->Name}}" name="name" id="username" aria-invalid="false" data-parsley-required="true"  data-parsley-trigger="change">
                    </div>
                    
                    <div class="form-group">
                      <label for="email">E-Mail</label>
                      <input type="text" class="form-control" placeholder="Email" value="{{$case->user->email}}" name="email" id="email" aria-invalid="false" data-parsley-required="true"  data-parsley-trigger="change">
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" placeholder="Address" value="{{$case->user->Address}}" name="address" id="address" aria-invalid="false" >
                    </div>

                    <div class="form-group">
                      <label for="Pincode">Pincode</label>
                      <input type="text" class="form-control" placeholder="Pincode" value="{{$case->user->Postcode}}" name="pincode" id="Pincode" aria-invalid="false" >
                    </div>
                    <div class="form-group">
                        <label for="Status">Status</label>
                        <select 
                          class="form-control" 
                          name="Status" 
                          id="Status" 
                          data-parsley-required="true"  
                          data-parsley-trigger="change"
                        > 
                          <option value=""> - Select Status -</option>
                          
                          <option value="Open" @if($case->Status=="Open") selected @endif> Open</option>
                          <option value="Close" @if($case->Status=="Close") selected @endif>Close </option>
                          <option value="Hold" @if($case->Status=="Hold") selected @endif>Hold </option>
                         
                        </select>
                      </div>
                 
                  </div>
                  <div class="col-md-6">


                    <div class="form-group">
                      <label for="PhoneNo">Telephone</label>
                      <input type="text" class="form-control" placeholder="PhoneNo" value="{{$case->user->Contact}}" name="contact" id="PhoneNo" aria-invalid="false" data-parsley-required="true"  data-parsley-trigger="change">
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
                          <option value="{{$user->id}}" @if($case->LaywerID==$user->id) selected @endif> {{ $user->name }} ( {{ $user->email }} ) </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" placeholder="City" value="{{$case->user->City}}" name="city" id="city" aria-invalid="false" >
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
                          <option value="{{$typ->CaseTypeID}}" @if($case->CaseTypeID==$typ->CaseTypeID) selected @endif> {{ $typ->CaseTypeName }} </option>
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
      <button type="submit" id="submit" class="btn btn-primary" > Update </button>
    </div>
    </form>
  </div>
</div>
</div>

<!-- view record -->
  <!-- Modal -->
  <div
  class="modal fade text-left"
  id="view_records"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myModalLabel17"
  aria-hidden="true"
  >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="record_title">Send Email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="send_email_case">
        @csrf
      <section class="full-editor">
        <div id="error_message"></div>
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <div class="card-body">
               <div class="input-group mb-2">
                 
              <p id="record_email"></p>
              </div>
              <div class="input-group mb-2">
                <p id="record_Subject"></p>
              </div>

              <div class="input-group mb-2">
              <div class="textarea" id="record_content" >
                
              </div>
            </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12">
        <div class="form-group">
          <img id="record_image" src="" width="100%" >
        </div>
      </div>
    </section>
    <div class="modal-footer">
      <button type="submit" id="submit" class="btn btn-primary" >Sende E-Mail</button>
    </div>
    </form>
    
  </div>
</div>
</div>
<!-- view recordend -->

<section class="basic-timeline">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Kunden Case History</h4>
        </div>
        <div class="card-body">
          <ul class="timeline">
            <li class="timeline-item">
              <span class="timeline-point">
                <i data-feather="dollar-sign"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>12 Invoices have been paid</h6>
                  <span class="timeline-event-time">12 min ago</span>
                </div>
                <p>Invoices have been paid to the company.</p>
                <div class="media align-items-center">
                  <img
                    class="mr-1"
                    src="{{asset('images/icons/file-icons/pdf.png')}}"
                    alt="invoice"
                    height="23"
                  />
                  <div class="media-body">invoice.pdf</div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-secondary">
                <i data-feather="user"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Client Meeting</h6>
                  <span class="timeline-event-time">45 min ago</span>
                </div>
                <p>Project meeting with john @10:15am.</p>
                <div class="media align-items-center">
                  <div class="avatar">
                    <img src="{{asset('images/avatars/12-small.png')}}" alt="avatar" height="38" width="38" />
                  </div>
                  <div class="media-body ml-50">
                    <h6 class="mb-0">John Doe (Client)</h6>
                    <span>CEO of Infibeam</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-success">
                <i data-feather="file-text"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Financial Report</h6>
                  <span class="timeline-event-time">2 hours ago</span>
                </div>
                <p class="mb-50">Click the button below to read financial reports</p>
                <button
                  class="btn btn-outline-primary btn-sm"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseExample2"
                  aria-expanded="true"
                  aria-controls="collapseExample2"
                >
                  Show Report
                </button>
                <div class="collapse" id="collapseExample2">
                  <ul class="list-group list-group-flush mt-1">
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>Last Year's Profit : <span class="font-weight-bold">$20000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> This Year's Profit : <span class="font-weight-bold">$25000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> Last Year's Commission : <span class="font-weight-bold">$5000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> This Year's Commission : <span class="font-weight-bold">$7000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> This Year's Total Balance : <span class="font-weight-bold">$70000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-warning">
                <i data-feather="map-pin"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6 class="mb-50">Interview Schedule</h6>
                  <span class="timeline-event-time">03:00 PM</span>
                </div>
                <p>Have to interview Katy Turner for the developer job.</p>
                <hr />
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <div class="media align-items-center">
                    <div class="avatar mr-1">
                      <img src="{{asset('images/avatars/1-small.png')}}" alt="Avatar" height="32" width="32" />
                    </div>
                    <div class="media-body">
                      <p class="mb-0">Katy Turner</p>
                      <span class="text-muted">Javascript Developer</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center cursor-pointer mt-sm-0 mt-50">
                    <i data-feather="message-square" class="mr-1"></i>
                    <i data-feather="phone-call"></i>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-danger">
                <i data-feather="shopping-bag"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Online Store</h6>
                  <span class="timeline-event-time">03:00PM</span>
                </div>
                <p>
                  Develop an online store of electronic devices for the provided layout, as well as develop a mobile
                  version of it. The must be compatible with any CMS.
                </p>
                <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column">
                  <div>
                    <p class="text-muted mb-50">Developers</p>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-primary avatar-sm mr-50">
                        <span class="avatar-content">A</span>
                      </div>
                      <div class="avatar bg-light-success avatar-sm mr-50">
                        <span class="avatar-content">B</span>
                      </div>
                      <div class="avatar bg-light-danger avatar-sm">
                        <span class="avatar-content">C</span>
                      </div>
                    </div>
                  </div>
                  <div class="mt-sm-0 mt-1">
                    <p class="text-muted mb-50">Deadline</p>
                    <p class="mb-0">20 Dec 2077</p>
                  </div>
                  <div class="mt-sm-0 mt-1">
                    <p class="text-muted mb-50">Budget</p>
                    <p class="mb-0">$50000</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info">
                <i data-feather="server"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between align-items-center mb-50">
                  <h6>Designing UI</h6>
                  <div>
                    <span class="badge badge-pill badge-light-primary">Design</span>
                  </div>
                </div>
                <p>
                  Our main goal is to design a new mobile application for our client. The customer wants a clean & flat
                  design.
                </p>
                <div>
                  <span class="text-muted">Participants</span>
                  <div class="avatar-group mt-50">
                    <div
                      data-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-placement="bottom"
                      data-original-title="Vinnie Mostowy"
                      class="avatar pull-up"
                    >
                      <img
                        class="media-object"
                        src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                    <div
                      data-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-placement="bottom"
                      data-original-title="Elicia Rieske"
                      class="avatar pull-up"
                    >
                      <img
                        class="media-object"
                        src="{{asset('images/portrait/small/avatar-s-7.jpg')}}"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                    <div
                      data-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-placement="bottom"
                      data-original-title="Julee Rossignol"
                      class="avatar pull-up"
                    >
                      <img
                        class="media-object"
                        src="{{asset('images/portrait/small/avatar-s-10.jpg')}}"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- full Editor end -->
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
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
<script src="{{ asset(mix('js/scripts/forms/form-quill-editor.js')) }}"></script>
<script src="{{ asset('js/scripts/pages/app-case-view.js') }}"></script>
<script type="text/javascript">
  
$(function () {

  $('#validate_form').parsley();
  /*create case*/
    var CaseID = $('#CaseID').val();
    $('#validate_form').on('submit', function(event){
     event.preventDefault();
    $('#validate_form').parsley();
    if($('#validate_form').parsley().isValid())
    {
    $('#validate_form').parsley();
    $('#modals-slide-in').modal('show');

    $.ajax({
      url: '{{ url("admin/update-case") }}/'+CaseID,
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
          $('#error_message_custom').html(errorsHtml);
          //appending to a <div id="error_message"></div> inside form 
          $('#error_message_custom').hide(2000);
          setTimeout(function(){ location.reload(); }, 2000);
          
          // window.location.href = '{{url("app/case")}}/'+data.CaseID;
        }else{
          //console.log(data.error);
          var errorsHtml = '<div class="alert alert-danger"><ul>';
          $.each(data.error,function (k,v) {
                 errorsHtml += '<li>'+ v + '</li>';
          });
          errorsHtml += '</ul></di>';
          $('#error_message_custom').html(errorsHtml);
          //appending to a <div id="error_message"></div> inside form 
        }
      }
     });
    }
    });







});

function show_details(title,subject,content,image ,email) {
    $('#record_title').text(title);
    $('#record_email').text(email);
    $('#record_Subject').text(subject);
    $('#record_content').html(content);
    $('#record_image').attr('src',image);
}

</script>
@endsection
