<?php


namespace App\Services;

use App\Services\BaseService;
use App\Repositories\ProjectTaskRepository;



class ProjectTaskService extends BaseService
{
    public function __construct(ProjectTaskRepository $repo)
    {
        $this->repo = $repo;
    }
}

