@extends('adminlte::page')

@section('content')

    <form method="POST" action="{{ route('projects.update', ["project" => $project->id]) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="inputName">Project Name</label>
                        <input type="text" class="form-control @error('project_name') is-invalid @enderror"  name="project_name" id="inputName"
                               value=" {{old('project_name') ?? $project->project_name }} ">
                        @error('project_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tasks">Project Tasks</label>
                        <select name="task"
                                class="form-control custom-select @error('task') is-invalid @enderror">
                            <option value="">Choose task</option>
                            @foreach($tasks as $task)
                                <option @if(old('task') && $task->task_name === old('task'))
                                        selected
                                        @endif
                                        value="{{ $task->id }}">{{ $task->task_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <input type="submit" value="Save Changes" class="btn btn-info">
                </form>


@stop
