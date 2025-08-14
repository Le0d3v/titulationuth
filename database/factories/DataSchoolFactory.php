<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Process;
use App\Models\DataSchool;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataSchool>
 */
class DataSchoolFactory extends Factory
{
     protected $model = DataSchool::class;
     
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener un usuario aleatorio que aún no tenga un registro en dataschool
        $user = User::whereDoesntHave('dataschool')->inRandomOrder()->first();
        $process = Process::whereDoesntHave('dataschool')->inRandomOrder()->first();

        if ($user) {
            return [
                'user_id' => $user->id,
                'career' => $this->faker->randomElement([
                    "Tecnologías de la Información",
                    "Procesos Industriales",
                    "Mercadotecnia",
                    "Mecatronica",
                    "Procesos Alimeticios",
                    "Diseño Textil",
                    "Metal Mecanica",
                    "Gestión de Negocios"
                ]),
                'specialty' => $this->faker->word(),
                'semester' => $this->faker->randomElement(["6", "11"]),
                'shift' => $this->faker->randomElement(['Matutino', 'Vespertino', 'Nocturno']),
                'process_id' => $process->id,
            ];
        } else {
            // Si no hay más usuarios sin registro en dataschool, detener la creación
            return $this->state(function () {
                return [];
            });
        }
    }
}
