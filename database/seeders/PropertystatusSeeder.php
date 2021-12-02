<?php

namespace Database\Seeders;

use App\Models\baseconst\Propertystatus;
use Illuminate\Database\Seeder;

class PropertystatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Propertystatus::create(
            ['propertystatus_description' => 'Guest User', 'propertystatus_abbr' => 'GU']
        );
        Propertystatus::create(
            ['propertystatus_description' => 'Developer', 'propertystatus_abbr' => 'DV']
        );
        Propertystatus::create(
            ['propertystatus_description' => 'Management', 'propertystatus_abbr' => 'MG']
        );
        Propertystatus::create(
            ['propertystatus_description' => 'Department Head','propertystatus_abbr' => 'DH']
        );
        Propertystatus::create(
            ['propertystatus_description' => 'Department Staff','propertystatus_abbr' => 'DS']
        );
    }
}
