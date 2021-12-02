<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\common\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::create(
            ['designation_description' => 'General Designation', 'designation_abbr' => 'GD']
        );
        Designation::create(
            ['designation_description' => 'General Manager', 'designation_abbr' => 'GM']
        );
        Designation::create(
            ['designation_description' => 'Software Engineer', 'designation_abbr' => 'SE']
        );
    }
}
