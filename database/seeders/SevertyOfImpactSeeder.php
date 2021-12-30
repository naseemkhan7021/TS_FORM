<?php

namespace Database\Seeders;

use App\Models\forms_66\SevertyOfImpact;
use Illuminate\Database\Seeder;

class SevertyOfImpactSeeder extends Seeder
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
                'severty_of_impact_value'=>'1','severty_of_impact_description'=>'Very Low','severty_of_impact_abbr'=>'VL','severty_of_impact_detail'=>'Negligible or Noticeable impact arise during routine inspection and maintenance of the equipment / activities that arise as per the schedule or manufacturers recommendation; continuous supervision available; noise level < 85 dB (A) at any time; wastewater effectively collected & treated etc. e.g. one or 2 drops of oil while handling falling on surface, Domestic Lighting where consumption is less then 2% of total electrical consumption – Spills visible outside of contaminated area.'
            ],

            [
                'severty_of_impact_value'=>'2','severty_of_impact_description'=>'Low','severty_of_impact_abbr'=>'LO','severty_of_impact_detail'=>'random minor leakage of the steam or compressed air from the valves; noise level > 85 dB (A) but < 90 dB (A); Inspection carried out but not on regular basis; lack of procedure etc. Leakages drop by drop continuous, requiring maintenance by stopping the operation , resource consumption in low quantity (e.g. use of paper occasionally 1 rim per month( consumption is more then 2% and less then 10% for oil, water, electricity, soil of to all consumption'
            ],
            [
                'severty_of_impact_value'=>'3','severty_of_impact_description'=>'Medium','severty_of_impact_abbr'=>'ME','severty_of_impact_detail'=>'Impact noticeable outside the facility - likely to cause damage. Such as global environmental issues (Ozone depletion, Green House Gas emission, acid rain) and deforestation; lack of waste minimisation program etc. Natural Resource Depletion – Water, Oil (in any form), minerals, wood etc. Accidental spills, leaks, emissions, natural resource consumption in moderate quantity (barrel) Resource consumption is between 10 to 30% for oil, water, chemical, electricity. Oil spill of les than 1 barrel- tier-1)  on land'
        ],
            [
                'severty_of_impact_value'=>'4','severty_of_impact_description'=>'High','severty_of_impact_abbr'=>'HI','severty_of_impact_detail'=>'Impact on vegetation / soil / Water / animal. PSV and any other safety valve pop-ups leading to release of chemicals / gases etc.; noise level > 90 dB (A) but < 95 dB (A) avg Day; maintenance carried out only during breakdowns; wastewater not effectively collected and treated as per protocol etc. Substantial leak, spills / breach of legal requirements, leading organization to shut down the operation partially. Quantity for oil, water, electricity, soil or any resource if between 30-49%; Oil / Chemical spill of (Less than 2 barrels tier-2)  on land, '
        ],
            [
                'severty_of_impact_value'=>'5','severty_of_impact_description'=>'Very High','severty_of_impact_abbr'=>'VH','severty_of_impact_detail'=>'Impact may lead to mass scale extinction/death of species/flora and fauna migration, Affecting Heritage, Archaeological structures, Global warming potential effect; noise level > 95 dB (A);  no effective recycle of waste method followed; potential to regulatory noncompliance etc.'
        ],
        ];

        SevertyOfImpact::insert($data);
    }
}
