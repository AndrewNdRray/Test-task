<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::all()->random()->id,
            'task_id' => Task::all()->random()->id
        ];
    }
}
