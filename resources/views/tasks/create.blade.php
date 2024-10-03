@extends('tasks.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task List
                            <!-- Tombol untuk membuka modal -->
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createTaskModal">
                                Create Task
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Daftar tasks atau konten lain -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk form create task -->
    <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTaskModalLabel">Create Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>ID</label>
                            <input type="text" name="user_id" class="form-control" />
                            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" />
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Due</label>
                            <input type="date" name="due_date" class="form-control" />
                            @error('due_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <br/>
                            <input type="text" name="status" class="form-control" placeholder="Pending/Progress/Completed" style="width:150px;height:30px;" />
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
