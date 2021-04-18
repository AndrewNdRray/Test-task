@extends('adminlte::page')

@section('content')
    @include('partials.alerts')
    <table id="tasks" class="table table-bordered table-hover dataTable" role="grid"
           aria-describedby="example2_info">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >Task ID
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Task Name
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Status
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >File
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Created at
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Updated at
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Actions
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr role="row">
                <td>{{ $task->id }}</td>
                <td>{{ $task->task_name }}</td>
                <td>{{ $task->status }}</td>
                <td><img class="img-fluid product-img" src="{{ $task->file }}"></td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->updated_at }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('tasks.show', ["task" => $task->id]) }}" type="button"
                           class="btn btn-info">View</a>
                        <a href="{{ route('tasks.edit', ["task" => $task->id]) }}" type="button"
                           class="btn btn-info">Edit</a>
                        <form method="POST" action="{{ route('tasks.destroy', ["task" => $task->id]) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="delete"  class="btn btn-info">
                        </form>
                    </div>
                </td>
        @endforeach
        </tbody>
    </table>

@stop
