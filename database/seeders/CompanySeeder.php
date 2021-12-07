<?php

namespace Database\Seeders;

use App\Models\common_forms\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create(
            ['sbc_company_name' => 'Talib and Shamsi', 'sbc_abbr' => 'T&S']);
    }
}



