<?php

namespace Database\Seeders;

use App\Models\Merchadise;
use Illuminate\Database\Seeder;
use App\Models\Merchadisecategory;
use App\Models\Merchadisestatus;

class MerchadiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $inactive=Merchadisestatus::where('Product_status','In active')->first();
    
        $inactivepackage=Merchadise::create([
            'merch_name'=>'Kitchen utensils',
            'merch_code'=>'merch-2261',
            'merch_price'=>'200',
            'merch_image'=>'utensils.jpg',
            'merchcat_id'=>'2',
            'merch_isactive'=>'1',
            'merch_details'=>'this is Kitchen Utensils',
            'product_discount'=>'20',
            'is_attribute'=>0,

        ]);
        $inactivepackage->merchadisestatus()->attach($inactive);
    }
}
