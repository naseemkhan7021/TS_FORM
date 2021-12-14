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
            'substandcondition_description' => 'Operating Equipment Without Authority', 'substandcondition_abbr' => 'OEWA'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Failure to warn', 'substandcondition_abbr' => 'FTW'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Failure to Secure', 'substandcondition_abbr' => 'FTS'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Failure to Follow Rules or Procedure', 'substandcondition_abbr' => 'FTFROP'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Horseplay', 'substandcondition_abbr' => 'HP'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Improper use of Equipment', 'substandcondition_abbr' => 'IUOE'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Failing to use of PPE', 'substandcondition_abbr' => 'FOUOP'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Making Safety Devices Inoperable', 'substandcondition_abbr' => 'MSDI'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Working on Dangerous Equipment', 'substandcondition_abbr' => 'WODE'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Under Influence of Drugs', 'substandcondition_abbr' => 'UIOD'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Unsafe Equipment or Condition', 'substandcondition_abbr' => 'UERC'
        ]);
        substandaction::create([
            'substandcondition_description' => 'Other', 'substandcondition_abbr' => 'OT'
        ]);
    }
}
