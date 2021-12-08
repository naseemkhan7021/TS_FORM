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
            ['potential_injurytos_description' => 'T&S Staff', 'potential_injurytos_abbr' => 'T&S']
        );
        PotentialInjuryto::create(
            ['potential_injurytos_description' => 'Sub-Contractor', 'potential_injurytos_abbr' => 'SC']
        );
        PotentialInjuryto::create(
            ['potential_injurytos_description' => 'Other', 'potential_injurytos_abbr' => 'OT']
        );
    }
}
