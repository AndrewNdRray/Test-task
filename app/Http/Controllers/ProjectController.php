<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Services\TaskService;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;


class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    private $projects;

    /**
     * @var TaskService
     */
    private $tasks;

    public function __construct(ProjectService $projects, TaskService $tasks) //сюда передается нужный объект сервиса
    {
        $this->projects = $projects; //сдесь имеем доступ к сервису
        $this->tasks = $tasks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index() // метод для отображения данных всех проектов
    {
        return view('project.index',
            [
                "projects" => $this->projects->all(),
                //"task" => $this->tasks->all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()  // метод для создания
    {

        return view('project.create',
            [
                "tasks" => $this->tasks->all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request) // метод для сохранения нового проекта
    {
        /** @var Project $project */

        $project = $this->projects->create($request->all());
        $project->tasks()->sync($request->input('task_id'));
        //$project->tasks()->sync($request->input('file'));

        return redirect()->route('projects.show', ["project" => $project->id])->withSuccess('Project #' . $project->id . 'was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id) // этот метод вывод конкретную модель продукта  по айдишнику из метода findById
    {
        return view('project.show',
            ["project" => $this->projects->findById($id),//метод возвращает конкретную модель по айдишнику
                "task" => $this->tasks->all()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id) // показать форму редактирования
    {

        return view('project.edit',
            [
                "project" => $this->projects->findById($id), //метод возвращает конкретную модель по айдишнику
                "tasks" => $this->tasks->all(),
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
    public function update(ProjectUpdateRequest $request, $id) // обновить отредактированый
    {
//        dd($request->all());

        /** @var Project $project */
        $project = Project::query()->find($id);

        $project->update($request->except(['_method', '_token']));
        $project->tasks()->sync($request->get('task'));


        return redirect()->route('projects.show', ["project" => $id])->withSuccess('Project #' . $id . 'was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->projects->destroy($id);
        return redirect()->route('projects.index')->withSuccess('Project #' . $id . 'was deleted!');
    }
}

