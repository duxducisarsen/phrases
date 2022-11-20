<?php

namespace Database\Factories;

use DuxDucisArsen\Phrases\Models\Phrase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhraseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phrase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => 99, // Pongo por defecto
            'phrase'      => $this->faker->name()
        ];
    }

    /**
     * Frase Pública
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function public()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_private' => 0,
            ];
        });
    }

    /**
     * Frase Privada
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function private()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_private' => 1,
            ];
        });
    }
}
