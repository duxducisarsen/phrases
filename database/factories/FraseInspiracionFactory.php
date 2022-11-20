<?php

namespace Database\Factories;

use App\Models\FraseInspiracion;
use Illuminate\Database\Eloquent\Factories\Factory;

class FraseInspiracionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FraseInspiracion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => 99, // Pongo por defecto
            'frase'      => $this->faker->name()
        ];
    }

    /**
     * Frase Pública
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function publica()
    {
        return $this->state(function (array $attributes) {
            return [
                'nivel_privacidad' => 0,
            ];
        });
    }

    /**
     * Frase Privada
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function privada()
    {
        return $this->state(function (array $attributes) {
            return [
                'nivel_privacidad' => 1,
            ];
        });
    }
}
