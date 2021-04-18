@extends('adminlte::page')

@section('content')
    <div class="row">
        @include('partials.alerts')
        <div class="col-md-12">
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> {{ $project->project_name }} </strong>

                <p class="text-muted">
                    ID is # {{ $project->id }}
                </p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Project Task</strong>

                <li> @foreach($project->tasks as $task)
                        {{ $task->task_name }}</li>
                @endforeach

                <hr>
                <strong><i class="fa fa-pencil margin-r-5"></i> Task Status</strong>

                <li> @foreach($project->tasks as $task)
                        {{ $task->status }}</li>
                @endforeach

                <hr>
                <strong><i class="fa fa-pencil margin-r-5"></i> Task File</strong>

                <li> @foreach($project->tasks as $task)
                        <img class="img-fluid product-img" src="{{ $task->file }}"></li>
                @endforeach

                <hr>


                <strong><i class="fa fa-pencil margin-r-5"></i> Time</strong>

                <p> Created at {{ $project->created_at }} </p>
                <p> Updatet at {{ $project->updated_at }} </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <a href="{{ route('projects.edit', ["project" => $project->id]) }}" type="button"
               class="btn btn-info">Edit</a>
        </div>




@stop
