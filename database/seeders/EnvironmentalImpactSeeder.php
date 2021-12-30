<?php

namespace Database\Seeders;

use App\Models\forms_66\EnvironmentalImpact;
use Illuminate\Database\Seeder;

class EnvironmentalImpactSeeder extends Seeder
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
                'environmental_impact_value' => '1', 'environmental_impact_description' => 'Air Pollution', 'environmental_impact_abbr' => 'AP', 'environmental_impact_detail' => 'Emission to air (like DG, boiler stacks/ incinerators/ vehicular etc.)'
            ],

            [
                'environmental_impact_value' => '2', 'environmental_impact_description' => 'Water Pollution', 'environmental_impact_abbr' => 'WP', 'environmental_impact_detail' => 'Discharge of Solid/ liquid waste to surface, water bodies etc.'
            ],
            [
                'environmental_impact_value' => '3', 'environmental_impact_description' => 'Land Pollution', 'environmental_impact_abbr' => 'Pn', 'environmental_impact_detail' => 'Disposal  of Solid/liquid/ Hazardous oil soaked cotton Waste on land'
            ],
            [
                'environmental_impact_value' => '4', 'environmental_impact_description' => 'Land Pollution/Water Pollution/Air Pollution', 'environmental_impact_abbr' => 'L/W/A P', 'environmental_impact_detail' => 'Spillage of oil/chemicals on concrete surface may lead to collection and disposal of cotton waste which is oil soaked or chemical soaked. Check the practice of disposal - it may be going to land directly or to water body  or waste cotton is burnt'
            ],
            [
                'environmental_impact_value' => '5', 'environmental_impact_description' => 'Land Pollution /water Pollution/Air Pollution depending upon the method of discharge', 'environmental_impact_abbr' => 'L/W/A P DUMD', 'environmental_impact_detail' => 'Disposal of Hazardous waste/ waste water/ incineration'
            ],
            [
                'environmental_impact_value' => '6', 'environmental_impact_description' => 'Climate Change', 'environmental_impact_abbr' => 'CCH', 'environmental_impact_detail' => 'Continuous Emission of CO2 at high temperature leading to global warming'
            ],
            [
                'environmental_impact_value' => '7', 'environmental_impact_description' => 'Ozone Depletion', 'environmental_impact_abbr' => 'OD', 'environmental_impact_detail' => 'Discharges of Ozone Depleting substances in uncontrolled manner'
            ],
            [
                'environmental_impact_value' => '8', 'environmental_impact_description' => 'Biodiversity effect', 'environmental_impact_abbr' => 'BE', 'environmental_impact_detail' => 'deforestation , pollution leading to loss of habitat'
            ],
            [
                'environmental_impact_value' => '9', 'environmental_impact_description' => 'Loss of resource', 'environmental_impact_abbr' => 'LoR', 'environmental_impact_detail' => 'heavy consumption of oil, raw material'
            ],
            [
                'environmental_impact_value' => '10', 'environmental_impact_description' => 'Air Pollution', 'environmental_impact_abbr' => 'EP', 'environmental_impact_detail' => 'VOC ( volatile organic compound ) released to atmosphere e.g. use of paints etc.'
            ],
        ];

        EnvironmentalImpact::insert($data);
    }
}
