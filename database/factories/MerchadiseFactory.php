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
            'merch_name'=>$this->faker->unique(5)->name(),
            'merch_code'=>$this->faker->numerify('merch-####'),
            'merch_price'=>$this->faker->numberBetween(300, 400),
            'merch_splprice'=>$this->faker->numberBetween(300, 350),
            'merch_image'=>'merchadise/product.PNG',
            'merch_isactive'=>0,
            'merchcat_id'=>$this->faker->numberBetween(1, 4),
            'merch_details'=>$this->faker->paragraphs(2, true)
        ];
    }
}
