<?php

namespace Database\Seeders;

use App\Models\forms_01\risk_consequence;
use Illuminate\Database\Seeder;

class RiskConsequence extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['risk_consequence_description'=>'Risk Consequence 1','risk_consequence_abbr'=>'RC1','risk_consequence_value'=>'1'],
            ['risk_consequence_description'=>'Risk Consequence 2','risk_consequence_abbr'=>'RC2','risk_consequence_value'=>'2'],
            ['risk_consequence_description'=>'Risk Consequence 3','risk_consequence_abbr'=>'RC3','risk_consequence_value'=>'3'],
        ];
        //
        risk_consequence::insert($data);
    }
}
