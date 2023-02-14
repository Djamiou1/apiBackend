<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produit;
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
        //  $faker = Faker\Factory::create();
           
        //  for($i=1; $i<30; $i++){
        //     Produit::create([
        //      'title' => $faker->sentence(15),
        //      'image' => 'https://via.placeholder.com/150/000000/FFFFFF/?text=IPaddress.net',
        //      'price' => $faker->numberBeetween(15, 300)*100,
        //      'category' => $faker->sentence(8),
        //      'description' => $faker->text,
        //      'localisation' => $faker->sentence(15)
        //     ]);
        // }

        return ([
             'title' => $this->faker->sentence(15),
             'image' => 'https://via.placeholder.com/150/000000/FFFFFF/?text=IPaddress.net',
             'price' => $this->faker->numberBetween(15, 300)*100,
             'category' => $this->faker->sentence(8),
             'description' => $this->faker->text,
             'localisation' => $this->faker->sentence(15),
            //  'user_id' => 1
        ]);
        
        
    }
}
