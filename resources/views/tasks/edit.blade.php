@extends('adminlte::page')

@section('content')
    <form method="POST" action="{{ route('tasks.update', ["task" => $task->id]) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="task_name">Task Name</label>
                        <input type="text" class="form-control @error('task') is-invalid @enderror"
                               name="task_name" id="task_name"
                               value="{{ $task->task_name }}">
                        @error('task_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select name="status" class="form-control custom-select @error('status') is-invalid @enderror">
                            <option @if(old('status') && "NEW" == old('status'))
                                    selected
                                    @endif
                                    value="NEW">NEW
                            </option>
                            <option @if(old('status') && "In Progress" == old('status'))
                                    selected
                                    @elseif(empty(old('status')) && "In Progress" )
                                    selected
                                    @endif
                                    value="In Progress">In Progress
                            </option>
                            <option @if(old('status') && "Done" == old('status'))
                                    selected
                                    @elseif(empty(old('status')) && "Done" )
                                    selected
                                    @endif
                                    value="Done">Done
                            </option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </form>
            </div>
            <input type="submit" value="Save Changes" class="btn btn-info">
        </div>


@stop
