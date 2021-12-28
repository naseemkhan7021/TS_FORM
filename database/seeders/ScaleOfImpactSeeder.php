<?php

namespace Database\Seeders;

use App\Models\forms_66\ScaleOfImpact;
use Illuminate\Database\Seeder;

class ScaleOfImpactSeeder extends Seeder
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
                'scale_of_impact_value' => '1', 'scale_of_impact_description' => 'Very Low', 'scale_of_impact_abbr' => 'VL', 'scale_of_impact_detail' => 'Impact (pollution) felt only at the source of generation / individual. Such as noise felt only near the operation area / activity etc. (Spot Effect)'
            ],

            [
                'scale_of_impact_value' => '2', 'scale_of_impact_description' => 'Low', 'scale_of_impact_abbr' => 'LO', 'scale_of_impact_detail' => 'Impact restricted or contained within the location / activity. Such as environmental impact arise realised only at the locations (utility / Operation /'
            ],
            [
                'scale_of_impact_value' => '3', 'scale_of_impact_description' => 'Medium', 'scale_of_impact_abbr' => 'ME', 'scale_of_impact_detail' => 'Impact felt at the surrounding working place. Such as nearby plants'
            ],
            [
                'scale_of_impact_value' => '4', 'scale_of_impact_description' => 'High', 'scale_of_impact_abbr' => 'HI', 'scale_of_impact_detail' => 'Impact felt at the entire operational area, Such as entire plant area'
            ],
            [
                'scale_of_impact_value' => '5','scale_of_impact_description'=>'Very High','scale_of_impact_abbr'=>'VH', 'scale_of_impact_detail' => 'Impact felt much beyond the operational area . Such as beyond Plant, surrounding community etc. '
            ],
        ];

        ScaleOfImpact::insert($data);
    }
}
