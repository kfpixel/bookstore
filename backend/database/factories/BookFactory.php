<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory{

    public function definition(){
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'isbn' => fake()->word(),
            'price' => fake()->numberBetween(10, 100),
        ];
    }

}