<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::all()->random()->id, 
            'sale_date' => now(), 
            'total' => $this->faker->randomFloat(10,2,10000000),
        ];
    }
}
