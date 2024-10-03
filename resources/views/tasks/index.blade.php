@extends('tasks.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <div class="card">

                <div class="card-body">
                    <div class="row">
                        @foreach ($tasks as $task)
                        <div class="col-md-3 mb-8">
                        <div class="card shadow-sm custom-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $task->user_id }}</h5>
                                    <p class="card-text">{{ $task->title }}</p>
                                    <p class="card-text">{{ $task->description }}</p>
                                    <p class="card-text">{{ $task->due_date }}</p>
                                    <p class="card-text">{{ $task->status }}</p>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showTaskModal{{ $task->id }}">
                                            Lihat
                                        </button>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editTaskModal{{ $task->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal untuk Show Task Detail -->
                        <div class="modal fade" id="showTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="showTaskModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="showTaskModalLabel{{ $task->id }}">Detail Task</h5>

                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>ID</label>
                                            <p>{{ $task->user_id }}</p>
                                            <label>Title</label>
                                            <p>{{ $task->title }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <p>{!! $task->description !!}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <p>{{ $task->status }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal untuk Edit Task  -->
                        <div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editTaskModalLabel{{ $task->id }}">Edit Task</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $task->title }}" />
                                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Description</label>
                                                <textarea name="description" rows="3" class="form-control">{{ $task->description }}</textarea>
                                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <input type="text" name="status" value="{{ $task->status }}" class="form-control" />
                                                <small class="text-muted">Pending/Progress/Completed</small>
                                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Update Task</button>
                                            </div>
                                            <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Create Task  -->
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
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control" />
                        @error('due_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" placeholder="Pending/Progress/Completed" />
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
