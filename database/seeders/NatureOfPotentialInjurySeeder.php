<?php

namespace Database\Seeders;


use App\Models\forms_15\NatureOfPotentialInjury;
use Illuminate\Database\Seeder;

class NatureOfPotentialInjurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NatureOfPotentialInjury::create(
            ['nature_of_potential_injuries_description' => 'Equipment damage', 'nature_of_potential_injuries_abbr' => 'WARNEDU']);
        NatureOfPotentialInjury::create(
            ['nature_of_potential_injuries_description' => 'Personal Injury', 'nature_of_potential_injuries_abbr' => 'WARNEDU']);
        NatureOfPotentialInjury::create(
            ['nature_of_potential_injuries_description' => 'Fire / Explosion', 'nature_of_potential_injuries_abbr' => 'WARNEDU']);

        NatureOfPotentialInjury::create(
            ['nature_of_potential_injuries_description' => 'Motor Vehicle', 'nature_of_potential_injuries_abbr' => 'WARNEDU']);
        NatureOfPotentialInjury::create(
            ['nature_of_potential_injuries_description' => 'Other', 'nature_of_potential_injuries_abbr' => 'WARNEDU']);

    }
}



