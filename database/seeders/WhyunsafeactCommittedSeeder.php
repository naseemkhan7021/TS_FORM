<?php

namespace Database\Seeders;

use App\Models\forms_15\WhyunsafeactCommitted;
use Illuminate\Database\Seeder;

class WhyunsafeactCommittedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhyunsafeactCommitted::create(
            ['whyunsafeact_committeds_description' => 'Physically unable / lack of time to finish', 'whyunsafeact_committeds_abbr' => 'PHYLACKTIMEFIN']);
        WhyunsafeactCommitted::create(
            ['whyunsafeact_committeds_description' => 'Lack of Knowledge / Skill', 'whyunsafeact_committeds_abbr' => 'LACKNOWSKILL']);
        WhyunsafeactCommitted::create(
            ['whyunsafeact_committeds_description' => 'Improper Job Attitude', 'whyunsafeact_committeds_abbr' => 'IMPJOBATT']);
        WhyunsafeactCommitted::create(
            ['whyunsafeact_committeds_description' => 'Other', 'whyunsafeact_committeds_abbr' => 'OTHER']);
    }
}



