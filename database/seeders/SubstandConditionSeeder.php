<?php

namespace Database\Seeders;

use App\Models\forms_17\substandcondition;
use Illuminate\Database\Seeder;

class SubstandConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         substandcondition::create([
            'substandcondition_description' => 'Inadequate Guards or Barriers', 'substandcondition_abbr' => 'IGOB'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Inadequate Or Improper Protective Equipment', 'substandcondition_abbr' => 'IRIPE'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Defective Tools', 'substandcondition_abbr' => 'DT'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Poor Housekeeping', 'substandcondition_abbr' => 'PH'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Inadequate Warning System', 'substandcondition_abbr' => 'IWS'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Noise Exposure', 'substandcondition_abbr' => 'NE'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Hazardous Method Of Working', 'substandcondition_abbr' => 'HMOW'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Inadequate Supervision', 'substandcondition_abbr' => 'IS'
        ]);
        substandcondition::create([
            'substandcondition_description' => 'Other', 'substandcondition_abbr' => 'OT'
        ]);
    }
}
