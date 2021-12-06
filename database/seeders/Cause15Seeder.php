<?php

namespace Database\Seeders;

use App\Models\forms_15\Cause15;
use Illuminate\Database\Seeder;

class Cause15Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cause15::create(
            ['Cause15s_description' => 'Failure to wear PPE', 'Cause15s_abbr' => 'FAILPPE']);
        Cause15::create(
            ['Cause15s_description' => 'Failure to follow Rules, Procedures', 'Cause15s_abbr' => 'FAILRUPRO']);
        Cause15::create(
            ['Cause15s_description' => 'Poor Housekeeping', 'Cause15s_abbr' => 'POORHSE']);
        Cause15::create(
            ['Cause15s_description' => 'Horseplay', 'Cause15s_abbr' => 'HORPLAY']);
        Cause15::create(
            ['Cause15s_description' => 'By-passing of Safety Devices', 'Cause15s_abbr' => 'SAFEDEVI']);
        Cause15::create(
            ['Cause15s_description' => 'Working on Dangerous Equipment/place', 'Cause15s_abbr' => 'DANGEQUPLA']);
        Cause15::create(
            ['Cause15s_description' => 'Improper use of Equipment', 'Cause15s_abbr' => 'IMPEQUP']);
        Cause15::create(
            ['Cause15s_description' => 'External factor / Third party / weather', 'Cause15s_abbr' => 'EFTPWEA']);
        Cause15::create(
            ['Cause15s_description' => 'Unsafe condition / equipment', 'Cause15s_abbr' => 'UNSCONEQP']);
        Cause15::create(
            ['Cause15s_description' => 'Other', 'Cause15s_abbr' => 'OTHER']);
    }
}





