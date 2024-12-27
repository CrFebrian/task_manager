@extends('tasks.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar
                            <a href="{{ url('tasks') }}" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                            <label>User ID</label>
                            <p>
                                {{ $tasks->user_id}}. {{ $tasks->user->name}}
                            </p>
                            </div>
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $tasks->title}}" />
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="description" rows="3" class="form-control">{!! $tasks->description !!}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="pending">Pending</option>
                                                    <option value="in_progress">In-Progress</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection