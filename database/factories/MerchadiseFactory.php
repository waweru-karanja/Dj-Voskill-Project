<?php

namespace Database\Factories;

use App\Models\Merchadise;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchadiseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Merchadise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'merch_name'=>$this->faker->unique(5)->company(),
            'merch_code'=>$this->faker->numerify('merch-####'),
            'merch_price'=>$this->faker->numberBetween(300, 400),
            // 'merch_splprice'=>$this->faker->numberBetween(300, 350),
            'merch_image'=>'product.PNG',
            'merch_isactive'=>1,
            'merchcat_id'=>$this->faker->numberBetween(1, 4),
            'merch_details'=>$this->faker->paragraphs(2, true),
            'product_discount'=>$this->faker->numberBetween(0,50),
            'is_attribute'=>1,
        ];
    }
}
