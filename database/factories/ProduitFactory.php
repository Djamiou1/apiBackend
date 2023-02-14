<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return ([
             'title' => $this->faker->sentence(15),
             'image' => 'https://via.placeholder.com/200',
             'price' => $this->faker->numberBetween(15, 300)*100,
             'category' => $this->faker->sentence(8),
             'description' => $this->faker->text,
             'user_id' =>  1,
             'localisation' => $this->faker->sentence(15),
            
        ]);
        
        
    }
}
