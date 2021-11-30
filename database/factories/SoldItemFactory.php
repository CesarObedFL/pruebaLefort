<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;


class SoldItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sale_id' => Sale::all()->random()->id, 
            'description' => $this->faker->sentence(3), 
            'department' => 'sports',//'home','beauty','food','pets'', 
            'price' => $this->faker->randomFloat(10,2,10000000),
        ];
    }
}
