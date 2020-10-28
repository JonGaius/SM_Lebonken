<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Articleattribute;
use App\Models\Subcategoryattribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleattributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articleattribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'value' => $this->faker->city,
            'slug' => $this->faker->unique()->slug,
            'article_id' => Article::all()->random()->id,
            'subcategoryattribute_id' => Subcategoryattribute::all()->random()->id
        ];
    }
}
