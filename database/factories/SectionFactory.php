<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'sectionable_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'sectionable_type' => $this->faker->randomElement(['paragraph', 'image', 'embed']),
        ];
    }
}
