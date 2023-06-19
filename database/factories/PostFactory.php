<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Uuid::generate(4)->string,
            'title' => ucwords($this->faker->words(3, true)),
            'subtitle' => $this->faker->sentence(),
            'author_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'status' => $this->faker->randomElement(['published', 'unpublished']),
        ];
    }
}
