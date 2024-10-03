@extends('tasks.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar
                            <a href="{{ url('tasks.create') }}" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
                            @csrf
                            @method('PUT')

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
                                <label>Status</label>
                                <br/>
                                <input type="" name="status" {{ $tasks->status}} style="width:150px;height:30px;" /> Pending/Progress/Completed
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