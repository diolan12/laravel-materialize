<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmbedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/XhFFNbC-Zpc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
        ];
    }
}
