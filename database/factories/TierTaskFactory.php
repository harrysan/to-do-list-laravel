<?php

namespace Database\Factories;

use App\Models\TierTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class TierTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TierTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'tier' => 1,
            'desc' => 'Low'
        ];
    }
}
