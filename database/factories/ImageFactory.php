<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Webpatser\Uuid\Uuid;

class ImageFactory extends Factory
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
            'title' => 'Gandrung',
            'path' => 'gandrung.jpg'
        ];
    }
}
