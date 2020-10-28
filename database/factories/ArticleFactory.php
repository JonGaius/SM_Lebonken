<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 
            'name' => $this->faker->streetAddress,
            'slug' => $this->faker->unique()->slug,
            'price' => $this->faker->numberBetween($min = 1000, $max = 999999),
            'condition' => $this->faker->numberBetween($min = 1, $max = 9),
            'description' => $this->faker->text($maxNbChars = 500),
            'livraison' => $this->faker->numberBetween($min = 0, $max = 999999),
            'quantity' => $this->faker->numberBetween($min = 1, $max = 999999),
            'subcategory_id' => Subcategory::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'images'=> $this->faker->imageUrl(800, 800, 'fashion', true, 'Faker').','.$this->faker->imageUrl(800, 800, 'fashion', true, 'Faker'),
        ];
    }
}
