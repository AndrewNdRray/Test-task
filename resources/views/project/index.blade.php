@extends('adminlte::page')

@section('content')
    @include('partials.alerts')
    <table id="projects" class="table table-bordered table-hover dataTable" role="grid"
           aria-describedby="example2_info">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >Project Name
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >Project task
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >Status
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >file
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Created at
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Updated at
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Actions
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr role="row ">
                <td>{{ $project->project_name }}</td>
                <td>
                    @foreach($project->tasks as $task)
                        {{ $task->task_name }}<br>
                </td>
                <td>
                    @foreach($project->tasks as $task)
                        {{ $task->status }}<br>
                    @endforeach
                </td>
                <td>
                    {{$task->file }}
                            <img class="img-fluid product-img" src="{{ $task->file }}">

                            <svg class="bd-placeholder-img card-img-top" width="2%" height="2"
                                 xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                 focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>
                                    Placeholder</title>
                                <rect width="10%" height="10%" fill="#55595c"/>
                                <text x="10%" y="10%" fill="#eceeef"
                                      dy=".3em">{{ $task->file  }}</text>
                            </svg>
                            <br>

                    @endforeach
                </td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>

                <td>
                    <div class="btn-group">
                        <a href="{{ route('projects.show', ["project" => $project->id]) }}" type="button"
                           class="btn btn-info">View</a>
                        <a href="{{ route('projects.edit', ["project" => $project->id]) }}" type="button"
                           class="btn btn-info">Edit</a>
                        <form method="POST" action="{{ route('projects.destroy', ["project" => $project->id]) }}">
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
