@extends('adminlte::page')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="task_name">Create Task</label>
                        <input type="text" class="form-control @error('task_name') is-invalid @enderror"
                               name="task_name" id="task_name" value="{{ old('task_name') }}">
                        @error('task_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input type="file" name="file" />

                    </div>
                    <button type="submit" onclick="create()" class="btn btn-info">Create Task</button>
                </form>



@endsection


