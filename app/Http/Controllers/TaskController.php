<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    /**
     * @var TaskService
     */
    private $tasks;

    public function __construct(TaskService $tasks) //сюда передается нужный объект сервиса
    {
        $this->tasks = $tasks; //сдесь имеем доступ к сервису
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // метод для отображения данных всех проектов
    {
        //dd('here');
        return view('tasks.index',

            [
                "tasks" => $this->tasks->all(),
            ]

        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  // метод для создания
    {
        //dd('here1');
        return view('tasks.create',
            [


            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request) // метод для сохранения нового проекта
    {
        $task = $this->tasks->create($request->all());
        $request->file->store('file');
        return redirect()->route('tasks.show', ["task" => $task->id])->withSuccess('Task #' . $task->id . 'was created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // этот метод вывод конкретную модель продукта  по айдишнику из метода findById
    {
        //dd('here2');
        return view('tasks.show', //метод возвращает конкретную модель по айдишнику
            [
                "task" => $this->tasks->findById($id)
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // показать форму редактирования
    {

        return view('tasks.edit',
            [
                "task" => $this->tasks->findById($id), //метод возвращает конкретную модель по айдишнику
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, $id) // обновить отредактированый
    {
        //dd(11);
        $this->tasks->update($id, $request->except(['_method', '_token']));
        return redirect()->route('tasks.show', ["task" => $id])->withSuccess('Task #' . $id . 'was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tasks->destroy($id);
        return tasks()->route('tasks.index')->withSuccess('Task #' . $id . 'was deleted!');
    }



}
