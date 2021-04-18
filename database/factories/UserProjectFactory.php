<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use App\Models\UserProject;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'project_id' => Project::all()->random()->id
        ];
    }
}
