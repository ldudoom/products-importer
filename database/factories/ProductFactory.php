<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->name(),
            'supplier' => $this->faker->company(),
            'product_data' => $this->faker->randomElement(
                [
                    [
                        'id' => Str::random(5),
                        'title' => $this->faker->name(),
                        'price' => $this->faker->randomFloat(2,0),
                        'currency' => $this->faker->currencyCode(),
                        'details' => [
                            'image' => $this->faker->imageUrl(),
                            'description' => $this->faker->sentence()
                        ]
                    ],
                    [
                        'id' => Str::random(5),
                        'item_title' => $this->faker->name(),
                        'price' => $this->faker->randomFloat(2,0).' '.$this->faker->currencyCode(),
                        'main_image' => $this->faker->imageUrl(),
                        'description' => $this->faker->sentence()
                    ],
                    [
                        'id' => Str::random(5),
                        'item_title' => $this->faker->name(),
                        'price' => $this->faker->randomFloat(2,0).' '.$this->faker->currencyCode(),
                        'main_image' => $this->faker->imageUrl(),
                    ]
            ]),
        ];
    }
}
