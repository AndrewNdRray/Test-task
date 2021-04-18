<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;


class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($this->faker));
        return [
            'task_name' => $this->faker->company,
            'file' => $this->faker->imageUrl($width = 640, $height = 480, '', true)

        ];
    }
}
