<?php

namespace Database\Seeders;

use App\Models\forms_15\ContributingCause;
use Illuminate\Database\Seeder;

class ContributingCauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContributingCause::create(
            ['contributing_causes_description' => 'Unsafe Condition', 'contributing_causes_abbr' => 'UNSCOND']);
        ContributingCause::create(
            ['contributing_causes_description' => 'Defective Equipment', 'contributing_causes_abbr' => 'DEFEQP']);
        ContributingCause::create(
            ['contributing_causes_description' => 'Hazardous method of working', 'contributing_causes_abbr' => 'HAZWORK']);
        ContributingCause::create(
            ['contributing_causes_description' => 'Unsafe guard', 'contributing_causes_abbr' => 'UNGGRD']);
        ContributingCause::create(
            ['contributing_causes_description' => 'Overworked / Tired', 'contributing_causes_abbr' => 'OVRTIRED']);
        ContributingCause::create(
            ['contributing_causes_description' => 'Inadequate Supervision', 'contributing_causes_abbr' => 'INDSUPER']);
        ContributingCause::create(
            ['contributing_causes_description' => 'Inadequate Procedures / Work Standards', 'contributing_causes_abbr' => 'INDPROWRKSTD']);
        ContributingCause::create(
            ['contributing_causes_description' => 'Other', 'contributing_causes_abbr' => 'OTHER']);
    }
}




