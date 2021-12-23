<?php

namespace Database\Seeders;

use App\Models\Merchadisestatus;
use Illuminate\Database\Seeder;

class MerchadisestatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merchadisestatus::create(['Product_status'=>'In active']);
    }
}
