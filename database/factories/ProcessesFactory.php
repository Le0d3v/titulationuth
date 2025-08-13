<?php

namespace Database\Factories;

use App\Models\Process;
use App\Models\Dataschool;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Process>
 */
class ProcessesFactory extends Factory
{
    protected $model = Process::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    $dataSchoolId = $this->faker->numberBetween(1, 100);

    return [
        'id' => $this->faker->unique()->numberBetween(1, 999999999),
        'data_validation' => $this->faker->boolean(),
        'images_upload' => $this->faker->boolean(),
        'donation_payment' => $this->faker->boolean(),
        'tittle_payment' => $this->faker->boolean(),
        'dataSchool_id' => $dataSchoolId,
        'created_at' => $this->faker->dateTime(),
        'updated_at' => $this->faker->dateTime(),
    ];
}

public function configure()
    {
        return $this->afterCreating(function (Process $process) {
            if (!Dataschool::find($process->dataSchool_id)) {
                $process->dataSchool_id = Dataschool::inRandomOrder()->first()->id;
                $process->save();
            }
        });
    }
}
