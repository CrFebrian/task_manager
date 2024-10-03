@extends('tasks.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Category Detail
                            <a href="{{ url('tasks') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                        <label>ID</label>
                            <p>
                                {{ $tasks->user_id }}
                            </p>
                            <label>Name</label>
                            <p>
                                {{ $tasks->title }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <p>
                                {!! $tasks->description !!}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <br/>
                            <p>
                                {{ $tasks->status }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection