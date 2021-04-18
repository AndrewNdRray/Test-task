<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\UserProject;



class UserProjectRepository extends BaseRepository
{
    public function __construct(UserProject $model) // модель класса юзер
    {
        $this->model = $model; // в конструктор репозитория бу передаваться модель юзера
    }
}
