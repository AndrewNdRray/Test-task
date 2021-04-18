<?php


namespace App\Services;

use App\Services\BaseService;
use App\Repositories\ProjectRepository;

class ProjectService extends BaseService //в сервисы передаем необходимый репозиторий для работы
{
    public function __construct(ProjectRepository $repo)
    {
        $this->repo = $repo;
    }
}
