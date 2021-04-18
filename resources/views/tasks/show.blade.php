@extends('adminlte::page')

@section('content')
    <div class="row">
        @include('partials.alerts')
        <div class="col-md-12">
        <div class="box-body">
            <p> Task name is <br>
            <strong><i class="fa fa-book margin-r-5"></i> {{ $task->task_name }} </strong>
            </p>

            <p> TaskID is <br>
                <strong><i class="fa fa-book margin-r-5"></i> {{ $task->id }} </strong>
            </p>

            <hr>

            <p> Status <br>
                <strong><i class="fa fa-book margin-r-5"></i> {{ $task->status }} </strong>
            </p>

            <hr>

            <p> TaskFile <br>
                <strong> <img class="img-fluid product-img" src="{{ $task->file }}"> </strong>

            </p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Created at </strong>

            <p> {{ $task->created_at }} </p>
            <hr>


            <strong><i class="fa fa-pencil margin-r-5"></i> Updatet at</strong>


            <p>  {{ $task->updated_at }} </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

            <a href="{{ route('tasks.edit', ["task" => $task->id]) }}" type="button"
               class="btn btn-info">Edit</a>





@stop
