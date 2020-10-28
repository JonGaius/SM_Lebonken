<?php

namespace Database\Factories;

use App\Models\Subcategory;
use App\Models\Subcategoryattribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryattributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcategoryattribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->companySuffix,
            'slug' => $this->faker->unique()->slug,
            'subcategory_id' => Subcategory::all()->random()->id,
            'type' => $this->faker->randomElement($array = array ('number','text')),
        ];
    }
}
