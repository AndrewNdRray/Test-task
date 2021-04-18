<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Models\Task;


class TaskRepository extends BaseRepository
{
    public function __construct(Task $model) // модель класса юзер
    {
        $this->model = $model; // в конструктор репозитория бу передаваться модель юзера
    }
}
