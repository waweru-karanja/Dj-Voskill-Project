<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\payment_methods;

class paymentmethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentmethods=[
            ['id'=>1,'payment_name'=>'MPESA','status'=>'0'],
            ['id'=>2,'payment_name'=>'PAYPAL','status'=>'0'],
            ['id'=>3,'payment_name'=>'SENDWAVE','status'=>'0'],
            ['id'=>4,'payment_name'=>'PAY CASH ON DELIVERY','status'=>'0']
            
        ];

        payment_methods::insert($paymentmethods);
    }
}
