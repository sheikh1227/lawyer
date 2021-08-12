
@extends('layouts/contentLayoutMaster')

@section('title', 'To-Do')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/dragula.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-todo.css')) }}">
@endsection
@include('content/apps/todo/app-todo-sidebar')
@section('content')
<div class="body-content-overlay"></div>
<div class="todo-app-list">
  <!-- Todo search starts -->
  <div class="app-fixed-search d-flex align-items-center">
    <div class="sidebar-toggle d-block d-lg-none ml-1">
      <i data-feather="menu" class="font-medium-5"></i>
    </div>
    <div class="d-flex align-content-center justify-content-between w-100">
      <div class="input-group input-group-merge">
        <div class="input-group-prepend">
          <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
        </div>
        <input
          type="text"
          class="form-control"
          id="todo-search"
          placeholder="Search task"
          aria-label="Search..."
          aria-describedby="todo-search"
        />
      </div>
    </div>
    <div class="dropdown">
      <a
        href="javascript:void(0);"
        class="dropdown-toggle hide-arrow mr-1"
        id="todoActions"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="todoActions">
        <a class="dropdown-item sort-asc" href="javascript:void(0)">Sort A - Z</a>
        <a class="dropdown-item sort-desc" href="javascript:void(0)">Sort Z - A</a>
        <a class="dropdown-item" href="javascript:void(0)">Sort Assignee</a>
        <a class="dropdown-item" href="javascript:void(0)">Sort Due Date</a>
        <a class="dropdown-item" href="javascript:void(0)">Sort Today</a>
        <a class="dropdown-item" href="javascript:void(0)">Sort 1 Week</a>
        <a class="dropdown-item" href="javascript:void(0)">Sort 1 Month</a>
      </div>
    </div>
  </div>
  <!-- Todo search ends -->

  <!-- Todo List starts -->
  <div class="todo-task-list-wrapper list-group">
    <ul class="todo-task-list media-list" id="todo-task-list">
  @foreach ( $data as $datas )
      <li class="todo-item" action="todo/{{ $datas->id }}" method="get">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck15" />
                <label class="custom-control-label" for="customCheck15"></label>
              </div>
              <span class="todo-title">{{ $datas->title }} </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper mr-1">
              <div class="badge badge-pill badge-light-primary">{{ $datas->tag }}</div>
            </div>
            <small class="text-nowrap text-muted mr-1">Sept 12</small>
            <div class="avatar bg-light-success">
              <div class="avatar-content">SW</div>
            </div>
          </div>
        </div>
      </li>
  @endforeach
      
    </ul>
    <div class="no-results">
      <h5>No Items Found</h5>
    </div>
  </div>
  <!-- Todo List ends -->
</div>

<!-- Right Sidebar starts -->
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
  <div class="modal-dialog sidebar-lg">
    <div class="modal-content p-0">
      <form action="/lawyer/todo" method="POST" >
       @csrf
       {{-- @foreach ( $data as $datas ) --}}
        <div class="modal-header align-items-center mb-1">
          <h5 class="modal-title">Add Tasks</h5>
          <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
            <span class="todo-item-favorite cursor-pointer mr-75"
              ><i data-feather="star" class="font-medium-2"></i
            ></span>
            <button
              type="button"
              class="close font-large-1 font-weight-normal py-0"
              data-dismiss="modal"
              aria-label="Close"
            >
              ×
            </button>
          </div>
        </div>
        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
          <div class="action-tags">
            <div class="form-group">
              <label for="todoTitleAdd" class="form-label">Title</label>
              <input
                type="text"
                id="todoTitleAdd"
                name="title"
                class="new-todo-item-title form-control"
                value="{{ $datas->title }}"
                placeholder="Title"
              />
            </div>
            <div class="form-group position-relative">
              <label for="task-assigned" class="form-label d-block">Assignee</label>
              <select class="select2 form-control" id="task-assigned" name="assign">
                <option
                  data-img="{{ asset('images/portrait/small/avatar-s-3.jpg') }}"
                  value="Phill Buffer"
                  selected
                >
                  Phill Buffer
                </option>
                <option data-img="{{ asset('images/portrait/small/avatar-s-1.jpg') }}" value="Chandler Bing">
                  Chandler Bing
                </option>
                <option data-img="{{ asset('images/portrait/small/avatar-s-4.jpg') }}" value="Ross Geller">
                  Ross Geller
                </option>
                <option data-img="{{ asset('images/portrait/small/avatar-s-6.jpg') }}" value="Monica Geller">
                  Monica Geller
                </option>
                <option data-img="{{ asset('images/portrait/small/avatar-s-2.jpg') }}" value="Joey Tribbiani">
                  Joey Tribbiani
                </option>
                <option data-img="{{ asset('images/portrait/small/avatar-s-11.jpg') }}" value="Rachel Green">
                  Rachel Green
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for="task-due-date" class="form-label">Due Date</label>
              <input type="text" class="form-control task-due-date" id="task-due-date" name="duedate" />
            </div>
            <div class="form-group">
              <label for="task-tag" class="form-label d-block">Tag</label>
              <select class="form-control task-tag" id="task-tag" name="tag" multiple="multiple">
                <option value="Team">Team</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Update">Update</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Description</label>
              <textarea name="description" id="task-desc"data-placeholder="Write Your Description" class="form-control"></textarea>
              <div class="d-flex justify-content-end desc-toolbar border-top-0">
                <span class="ql-formats mr-0">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-align"></button>
                  <button class="ql-link"></button>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group my-1">
            {{-- <button type="submit" class="btn btn-primary d-none add-todo-item mr-1">Add</button> --}}
            <button type="submit" class="btn btn-primary mr-1">Add Task</button>

            <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-primary d-none update-btn update-todo-item mr-1">Update</button>
            <button type="button" class="btn btn-outline-danger update-btn d-none" data-dismiss="modal">Delete</button>
          </div>
        </div>
  {{-- @endforeach --}}

      </form>
    </div>
  </div>
</div>
<!-- Right Sidebar ends -->

@endsection

@section('vendor-script')
<!-- vendor js files -->
  <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/dragula.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/app-todo.js')) }}"></script>
@endsection
