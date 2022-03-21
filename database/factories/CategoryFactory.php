<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();
        return [
    'name' => $name,
    'slug' => Str::slug($name),
    'image'=> [ // Do not json_encode this as your model will handle the conversion
        '1' => $this->faker->image('public/upload_category_img',640,480, null, false),
        '2' => $this->faker->image('public/upload_category_img',640,480, null, false),
    ],
];

}
}
