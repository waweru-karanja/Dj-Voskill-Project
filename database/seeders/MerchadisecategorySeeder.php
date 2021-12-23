<?php

namespace Database\Seeders;

use App\Models\Merchadisecategory;
use Illuminate\Database\Seeder;

class MerchadisecategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchadisecategories=[
            ['id'=>1,'merchadisecat_title'=>'Men Clothes','category_discount'=>'10'],
            ['id'=>2,'merchadisecat_title'=>'Women Clothes','category_discount'=>'5'],
            ['id'=>3,'merchadisecat_title'=>'Accessories','category_discount'=>'20'],
            ['id'=>4,'merchadisecat_title'=>'Kids Clothes','category_discount'=>'7']
            
        ];

        Merchadisecategory::insert($merchadisecategories);
    }
}
