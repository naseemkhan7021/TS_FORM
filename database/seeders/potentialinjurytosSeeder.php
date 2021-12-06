<?php

namespace Database\Seeders;

use App\Models\common_forms\PotentialInjuryto;
use Illuminate\Database\Seeder;

class potentialinjurytosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PotentialInjuryto::create(
            ['potential_injurytos_description' => 'T&S Staff', 'potential_injurytos_abbr' => 'T&SSTAFF']);
        PotentialInjuryto::create(
            ['potential_injurytos_description' => 'Sub-Contractor', 'potential_injurytos_abbr' => 'SUBCONT']);
        PotentialInjuryto::create(
            ['potential_injurytos_description' => 'Others.', 'potential_injurytos_abbr' => 'OTHER']);
    }
}




