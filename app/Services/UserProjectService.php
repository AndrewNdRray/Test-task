<?php


namespace App\Services;

use App\Services\BaseService;
use App\Repositories\UserProjectRepository;


class UserProjectService extends BaseService
{
    public function __construct(UserProjectRepository $repo)
    {
        $this->repo = $repo;
    }
}
