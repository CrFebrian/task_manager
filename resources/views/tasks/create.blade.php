@extends('tasks.main')

@section('content')

            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>User ID</label>
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
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                            <?php foreach ($Cate as $c) { ?>
                                <option value="{{$c->id}}"> <?php echo $c->name ?> </option>
                            <?php } ?>
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
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
                        <button type="submit" class="btn btn-primary">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
