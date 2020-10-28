<?php

namespace Database\Factories;

use App\Models\Boutique;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoutiqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boutique::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->company,
            'document_images' => $this->faker->imageUrl($width = 640, $height = 480),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'banner' => $this->faker->imageUrl($width = 640, $height = 480),
            'user_id' => User::all()->random()->id,
            'slug' => $this->faker->uuid,
        ];
    }
}
