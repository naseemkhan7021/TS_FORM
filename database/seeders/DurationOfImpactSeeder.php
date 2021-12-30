<?php

namespace Database\Seeders;

use App\Models\forms_66\DurationOfImpact;
use Illuminate\Database\Seeder;

class DurationOfImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'duration_of_impact_value'=>'1','duration_of_impact_description'=>'Very Low','duration_of_impact_abbr'=>'VL','duration_of_impact_detail'=>'Impact exists only up to single day.  Impact that occurred can be mitigated to full extent with in same time and no irreversible impact on the environment.'
            ],

            [
                'duration_of_impact_value'=>'2','duration_of_impact_description'=>'Low','duration_of_impact_abbr'=>'LO','duration_of_impact_detail'=>'impact exist more than a day and for mitigating the impact need more than 2 days'
            ],
            [
                'duration_of_impact_value'=>'3','duration_of_impact_description'=>'Medium','duration_of_impact_abbr'=>'ME','duration_of_impact_detail'=>'impact is going to be there several times a day whenever activity is carried out. The impact is temporary and last not more than a hour every time'
        ],
            [
                'duration_of_impact_value'=>'4','duration_of_impact_description'=>'High','duration_of_impact_abbr'=>'HI','duration_of_impact_detail'=>'Impact last for more than 7 time and results in loss of resources, environmental resilience etc.'
        ],
            [
                'duration_of_impact_value'=>'5','duration_of_impact_description'=>'Very High','duration_of_impact_abbr'=>'VH','duration_of_impact_detail'=>'Impact exists > Week. Irreversible impact such as > 100 tons of CO2 equivalent GHG emitted to the atmosphere per annum (from individual or collection activities) due to inefficient operation; Loss of Biodiversity, Forest desertification '
        ],
        ];

        DurationOfImpact::insert($data);
    }
}
