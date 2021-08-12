<div class="modal modal-slide-in sidebar-todo-modal fade" id="edit-task-modal">
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <form action="/lawyer/todo" method="POST">
                @csrf
                {{-- @foreach ($data as $datas) --}}
                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title">Edit Tasks</h5>
                    <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                        <span class="todo-item-favorite cursor-pointer mr-75"><i data-feather="star"
                                class="font-medium-2"></i></span>
                        <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal"
                            aria-label="Close">
                            ×
                        </button>
                    </div>
                </div>
                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <div class="action-tags">
                        <div class="form-group">
                            <label for="todoTitleAdd" class="form-label">Title</label>
                            <input type="text" id="todoTitleAdd" name="title" class="new-todo-item-title form-control"
                                value="{{ $datas->title }}" placeholder="Title" />
                        </div>
                        <div class="form-group position-relative">
                            <label for="task-assigned" class="form-label d-block">Assignee</label>
                            <select class="select2 form-control" id="task-assigned" name="assign">
                                <option data-img="{{ asset('images/portrait/small/avatar-s-3.jpg') }}"
                                    value="Phill Buffer" {{ $datas->Assign === ' Phill Buffer' ? 'selected' : '' }}>
                                    Phill Buffer
                                </option>
                                <option data-img="{{ asset('images/portrait/small/avatar-s-1.jpg') }}"
                                    {{ $datas->Assign === 'Chandler Bing' ? 'selected' : '' }} value="Chandler Bing">
                                    Chandler Bing

                                </option>
                                <option data-img="{{ asset('images/portrait/small/avatar-s-4.jpg') }}"
                                    {{ $datas->Assign === ' Ross Geller' ? 'selected' : '' }} value="Ross Geller">
                                    Ross Geller

                                </option>
                                <option data-img="{{ asset('images/portrait/small/avatar-s-6.jpg') }}"
                                    {{ $datas->Assign === 'Monica Geller' ? 'selected' : '' }} value="Monica Geller">
                                    Monica Geller

                                </option>
                                <option data-img="{{ asset('images/portrait/small/avatar-s-2.jpg') }}"
                                    {{ $datas->Assign === 'Joey Tribbiani' ? 'selected' : '' }}
                                    value="Joey Tribbiani">
                                    Joey Tribbiani

                                </option>
                                <option data-img="{{ asset('images/portrait/small/avatar-s-11.jpg') }}"
                                    {{ $datas->Assign === '  Rachel Green' ? 'selected' : '' }} value="Rachel Green">
                                    Rachel Green
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="task-due-date" class="form-label">Due Date</label>
                            <input type="text" class="form-control task-due-date" value="{{ $datas->due_date }}"
                                id="task-due-date" name="duedate" />
                        </div>
                        <div class="form-group">
                            <label for="task-tag" class="form-label d-block">Tag</label>
                            <select class="form-control task-tag" id="task-tag" name="tag" multiple="multiple">
                                <option value="Team" {{ $datas->tag == 'Team' ? 'selected' : '' }}>Team</option>
                                <option value="Low" {{ $datas->tag == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Medium" {{ $datas->tag == 'Medium' ? 'selected' : '' }}>Medium
                                </option>
                                <option value="High" {{ $datas->tag == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Update" {{ $datas->tag == 'Update' ? 'selected' : '' }}>Update
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="task-desc" data-placeholder="Write Your Description"
                                class="form-control">{{ $datas->description }}</textarea>

                        </div>
                    </div>
                    <div class="form-group my-1">
                        {{-- <button type="submit" class="btn btn-primary d-none add-todo-item mr-1">Add</button> --}}
                        {{-- <button type="submit" class="btn btn-primary mr-1">Add Task</button>
  
              <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-dismiss="modal">
                Cancel
              </button> --}}
                        <button type="submit" class="btn btn-primary  update-btn update-todo-item mr-1">Update</button>
                        <button type="button" class="btn btn-outline-danger update-btn "
                            data-dismiss="modal">Delete</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
