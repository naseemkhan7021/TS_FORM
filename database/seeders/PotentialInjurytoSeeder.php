<?php

namespace Database\Seeders;

use App\Models\common_forms\PotentialInjuryto;
use Illuminate\Database\Seeder;

class PotentialInjurytoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PotentialInjuryto::create(
            ['potential_injurytos_description' => 'Staff', 'potential_injurytos_abbr' => 'sf']
        );
    }
}
