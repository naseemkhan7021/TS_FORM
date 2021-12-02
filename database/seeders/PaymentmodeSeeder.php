<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\baseconst\Paymentmode;

class PaymentmodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paymentmode::create(
            ['paymentmode_description' => 'Cheque', 'paymentmode_abbr' => 'CHQ']
        );
        Paymentmode::create(
            ['paymentmode_description' => 'Bank Draft', 'paymentmode_abbr' => 'BD']
        );
        Paymentmode::create(
            ['paymentmode_description' => 'Demand Draft', 'paymentmode_abbr' => 'DD']
        );
        Paymentmode::create(
            ['paymentmode_description' => 'UPI','paymentmode_abbr' => 'UPI']
        );

    }
}






