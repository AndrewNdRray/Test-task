<?php


namespace App\Services;

use App\Services\BaseService;
use App\Repositories\TaskRepository;


class TaskService extends BaseService
{
    public function __construct(TaskRepository $repo)
    {
        $this->repo = $repo;
    }
}
