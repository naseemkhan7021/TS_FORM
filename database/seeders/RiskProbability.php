<?php

namespace Database\Seeders;

use App\Models\forms_01\risk_probability;
use Illuminate\Database\Seeder;

class RiskProbability extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['risk_probability_description'=>'Risk Probability 1','risk_probability_abbr'=>'RP1','risk_probability_value'=>'1'],
            ['risk_probability_description'=>'Risk Probability 2','risk_probability_abbr'=>'RP2','risk_probability_value'=>'2'],
            ['risk_probability_description'=>'Risk Probability 3','risk_probability_abbr'=>'RP3','risk_probability_value'=>'3'],
        ];
        //
        risk_probability::insert($data);
    }
}
