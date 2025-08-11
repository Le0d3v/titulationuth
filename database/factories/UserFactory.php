<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        $lastName = explode(' ', $name)[0]; // Obtener el primer apellido
        $birthDate = $this->faker->date('Y-m-d'); // Fecha de nacimiento aleatoria
        $gender = $this->faker->randomElement(['M', 'F']);

        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'tuition' => $this->faker->numerify('##########'),
            'born_date' => fake()->date(),
            'telephone' => $this->faker->numerify('##########'),
            'rol' => 0,
            'gener' => $this->faker->randomElement(["M", "F"]),
            'civil_state' => $this->faker->randomElement(["Soltero", "Casado", "Divorciado"]),
            'rfc' => $this->generateRFC($name, $birthDate),
            'curp' => $this->generateCURP($name, $lastName, $birthDate, $gender),
        ];
    }

    /**
     * Generar un RFC falso.
     *
     * @param string $name
     * @param string $birthDate
     * @return string
     */
    protected function generateRFC($name, $birthDate)
    {
        // Obtener las primeras letras del nombre
        $nameParts = explode(' ', $name);
        $firstInitial = strtoupper(substr($nameParts[0], 0, 1));
        $lastNameInitial = strtoupper(substr($nameParts[1], 0, 1));

        // Formato de fecha (AAMMDD)
        $date = \Carbon\Carbon::parse($birthDate);
        $dateFormat = $date->format('ymd');

        // Generar los últimos 3 caracteres aleatorios
        $randomChars = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 3));

        return "$firstInitial$lastNameInitial$dateFormat$randomChars";
    }

    /**
     * Generar un CURP falso.
     *
     * @param string $name
     * @param string $lastName
     * @param string $birthDate
     * @param string $gender
     * @return string
     */
    protected function generateCURP($name, $lastName, $birthDate, $gender)
    {
        // Obtener las iniciales del nombre y apellidos
        $firstInitial = strtoupper(substr($lastName, 0, 1));
        $secondInitial = strtoupper(substr($lastName, strpos($lastName, ' ') + 1, 1));
        $thirdInitial = strtoupper(substr($name, 0, 1));

        // Formato de fecha (AAMMDD)
        $date = \Carbon\Carbon::parse($birthDate);
        $dateFormat = $date->format('ymd');

        // Generar la letra del género
        $genderLetter = strtoupper($gender === 'M' ? 'H' : 'M'); // 'H' para hombre, 'M' para mujer

        // Generar los últimos caracteres aleatorios
        $randomChars = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5));

        return "$firstInitial$secondInitial$thirdInitial$dateFormat$genderLetter$randomChars";
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
