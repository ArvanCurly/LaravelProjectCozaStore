<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = array ("XS","S","M","L","XL","XXL");
        $array1 = array ("red","green","purple","white","black","blue","yellow","pink","orange");

        return [

            'titre' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'description' => $this->faker->paragraph(),

            'taille' => [ // Do not json_encode this as your model will handle the conversion
                '1' => $this->faker->randomElement($array),
                '2' => $this->faker->randomElement($array)
            ],
            'couleur' => [ // Do not json_encode this as your model will handle the conversion
                '1' => $this->faker->randomElement($array1),
                '2' => $this->faker->randomElement($array1),
            ],

            'prix'=> $this->faker->randomFloat(2, 8, 100 ),
            'dimension'=> $this->faker->name(),
            'material'=> $this->faker->name(),
            'poid'=> $this->faker->randomFloat(2, 0, 20 ),
            'type_id'=> $this->faker->numberBetween(1,3),
            'image'=> [ // Do not json_encode this as your model will handle the conversion
                '1' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
                '2' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            ],
        ];
    }
}
