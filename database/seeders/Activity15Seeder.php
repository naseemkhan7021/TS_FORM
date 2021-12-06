<?php

namespace Database\Seeders;

use App\Models\forms_15\Activity15;
use Illuminate\Database\Seeder;

class Activity15Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity15::create(
            ['activity15s_description' => 'Working at Height', 'activity15s_abbr' => 'W@H']);
        Activity15::create(
            ['activity15s_description' => 'Scaffolding', 'activity15s_abbr' => 'SCAFF']);
        Activity15::create(
            ['activity15s_description' => 'Material Handling', 'activity15s_abbr' => 'MATHAND']);
        Activity15::create(
            ['activity15s_description' => 'Operating Plant', 'activity15s_abbr' => 'OPTPLT']);

        Activity15::create(
            ['activity15s_description' => 'Motor Vehicle', 'activity15s_abbr' => 'MTRVEH']);
        Activity15::create(
            ['activity15s_description' => 'Welding / Cutting', 'activity15s_abbr' => 'WELD/CUT']);
        Activity15::create(
            ['activity15s_description' => 'Foreign Body', 'activity15s_abbr' => 'FORBODY']);
        Activity15::create(
            ['activity15s_description' => 'Other', 'activity15s_abbr' => 'OA']);


    }
}




