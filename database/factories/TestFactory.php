<?php

namespace Database\Factories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tas_usu_id' => $this->faker->numerify('##'),
            'tas_pro_id' => $this->faker->numerify('##'),
            'tas_name'   => $this->faker->name,
            'tas_hours'  => $this->faker->numerify('##'),

        ];
    }
}
