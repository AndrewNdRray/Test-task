<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\ProjectTask;


class ProjectTaskRepository extends BaseRepository
{
    public function __construct(ProjectTask $model) // модель класса юзер
    {
        $this->model = $model; // в конструктор репозитория бу передаваться модель юзера
    }

}
