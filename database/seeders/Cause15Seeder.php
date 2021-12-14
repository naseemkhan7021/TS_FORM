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
            ['cause15s_description' => 'Failure to wear PPE', 'cause15s_abbr' => 'FAILPPE']);
        Cause15::create(
            ['cause15s_description' => 'Failure to follow Rules, Procedures', 'cause15s_abbr' => 'FAILRUPRO']);
        Cause15::create(
            ['cause15s_description' => 'Poor Housekeeping', 'cause15s_abbr' => 'POORHSE']);
        Cause15::create(
            ['cause15s_description' => 'Horseplay', 'cause15s_abbr' => 'HORPLAY']);
        Cause15::create(
            ['cause15s_description' => 'By-passing of Safety Devices', 'cause15s_abbr' => 'SAFEDEVI']);
        Cause15::create(
            ['cause15s_description' => 'Working on Dangerous Equipment/place', 'cause15s_abbr' => 'DANGEQUPLA']);
        Cause15::create(
            ['cause15s_description' => 'Improper use of Equipment', 'cause15s_abbr' => 'IMPEQUP']);
        Cause15::create(
            ['cause15s_description' => 'External factor / Third party / weather', 'cause15s_abbr' => 'EFTPWEA']);
        Cause15::create(
            ['cause15s_description' => 'Unsafe condition / equipment', 'cause15s_abbr' => 'UNSCONEQP']);
        Cause15::create(
            ['cause15s_description' => 'Other', 'cause15s_abbr' => 'OTHER']);
    }
}





