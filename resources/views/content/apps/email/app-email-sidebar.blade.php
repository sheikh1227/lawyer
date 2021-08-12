
@section('content-sidebar')
<div class="sidebar-content email-app-sidebar">
  <div class="email-app-menu">
    <div class="form-group-compose text-center compose-btn">
      <button
        type="button"
        class="compose-email btn btn-primary btn-block"
        data-backdrop="false"
        data-toggle="modal"
        data-target="#compose-mail"
      >
        Compose
      </button>
    </div>
    <div class="sidebar-menu-list">
      <div class="list-group list-group-messages">
        <a href="javascript:void(0)" class="list-group-item list-group-item-action active">
          <i data-feather="mail" class="font-medium-3 mr-50"></i>
          <span class="align-middle">Inbox</span>
          <span class="badge badge-light-primary badge-pill float-right">1</span>
        </a>
		  
		   <a href="#" class="list-group-item list-group-item-action">
          <i data-feather="star" class="font-medium-3 me-50"></i>
          <span class="align-middle">Important</span>
          <span class="badge badge-light-warning rounded-pill float-end">2</span>
        </a>
        <a href="javascript:void(0)" class="list-group-item list-group-item-action">
          <i data-feather="send" class="font-medium-3 mr-50"></i>
          <span class="align-middle">Sent</span>
        </a>
       
        <a href="javascript:void(0)" class="list-group-item list-group-item-action">
          <i data-feather="trash" class="font-medium-3 mr-50"></i>
          <span class="align-middle">Trash</span>
        </a>
      </div>
      <!-- <hr /> -->
      <h6 class="section-label mt-3 mb-1 px-2">Labels</h6>
      <div class="list-group list-group-labels">
      
       <a href="javascript:void(0)" class="list-group-item list-group-item-action"
          ><span class="bullet bullet-sm bullet-primary mr-1"></span>Readed</a
        >
       <a href="javascript:void(0)" class="list-group-item list-group-item-action"
          ><span class="bullet bullet-sm bullet-warning mr-1"></span>to resolve</a
        >
        <a href="javascript:void(0)" class="list-group-item list-group-item-action"
          ><span class="bullet bullet-sm bullet-success mr-1"></span>resolved</a
        >

      </div>
    </div>
  </div>
</div>

@endsection
