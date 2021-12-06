<?php

namespace Database\Seeders;

use App\Models\forms_15\ImdAction;
use Illuminate\Database\Seeder;

class ImdActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImdAction::create(
            ['imd_actions_description' => 'Stop further activity', 'imd_actions_abbr' => 'STPFURACT']);
        ImdAction::create(
            ['imd_actions_description' => 'Training & Instruction', 'imd_actions_abbr' => 'TRNINS']);
        ImdAction::create(
            ['imd_actions_description' => 'Maintain Discipline', 'imd_actions_abbr' => 'MTNDIS']);

    }
}


