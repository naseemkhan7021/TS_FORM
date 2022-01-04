<?php

namespace Database\Seeders;

use App\Models\forms_17\substandaction;
use Illuminate\Database\Seeder;

class SubstandActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        substandaction::create([
            'substandaction_description' => 'Operating Equipment Without Authority', 'substandaction_abbr' => 'OEWA'
        ]);
        substandaction::create([
            'substandaction_description' => 'Failure to warn', 'substandaction_abbr' => 'FTW'
        ]);
        substandaction::create([
            'substandaction_description' => 'Failure to Secure', 'substandaction_abbr' => 'FTS'
        ]);
        substandaction::create([
            'substandaction_description' => 'Failure to Follow Rules or Procedure', 'substandaction_abbr' => 'FTFROP'
        ]);
        substandaction::create([
            'substandaction_description' => 'Horseplay', 'substandaction_abbr' => 'HP'
        ]);
        substandaction::create([
            'substandaction_description' => 'Improper use of Equipment', 'substandaction_abbr' => 'IUOE'
        ]);
        substandaction::create([
            'substandaction_description' => 'Failing to use of PPE', 'substandaction_abbr' => 'FOUOP'
        ]);
        substandaction::create([
            'substandaction_description' => 'Making Safety Devices Inoperable', 'substandaction_abbr' => 'MSDI'
        ]);
        substandaction::create([
            'substandaction_description' => 'Working on Dangerous Equipment', 'substandaction_abbr' => 'WODE'
        ]);
        substandaction::create([
            'substandaction_description' => 'Under Influence of Drugs', 'substandaction_abbr' => 'UIOD'
        ]);
        substandaction::create([
            'substandaction_description' => 'Unsafe Equipment or Condition', 'substandaction_abbr' => 'UERC'
        ]);
        substandaction::create([
            'substandaction_description' => 'Other', 'substandaction_abbr' => 'OT'
        ]);
    }
}
