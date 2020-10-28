<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->country,
            'slug' => $this->faker->unique()->slug,
            'code' => $this->faker->unique()->numberBetween($min = 1, $max = 999),
            'devise' => $this->faker->randomElement($array = array ('XOF','Euro','USD','Yen','Youan','Dinnar','Francs Suisse')),
        ];
    }
}
