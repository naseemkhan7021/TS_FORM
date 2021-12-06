<?php

namespace Database\Seeders;

use App\Models\forms_15\ImdCorrection;
use Illuminate\Database\Seeder;

class ImdCorrectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImdCorrection::create(
            ['imd_corrections_description' => 'Remove', 'imd_corrections_abbr' => 'RMV']);
        ImdCorrection::create(
            ['imd_corrections_description' => 'Guard', 'imd_corrections_abbr' => 'GRD']);
        ImdCorrection::create(
            ['imd_corrections_description' => 'Warn / Educate', 'imd_corrections_abbr' => 'WARNEDU']);
    }
}


