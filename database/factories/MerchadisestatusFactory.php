<?php

namespace Database\Factories;

use App\Models\Merchadisestatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchadisestatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Merchadisestatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Product_status'=>'Active',
        ];
    }
}
