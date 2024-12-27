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
                                    
                                    <h5 class="card-title">{{ $task->user_id }}. {{$task->user->name}}</h5>
                                    <p class="card-text">{{ $task->title }}</p>
                                    <p class="card-text">{{ $task->description }}</p>
                                    <p class="card-text">{{ $task->due_date }}</p>
                                    <p class="card-text">{{ $task->status }}</p>
                                    <p class="card-text">{{ $task->category->name }}</p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">
                                            Lihat
                                        </a>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
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

@endsection
