<?php

namespace Database\Seeders;

use App\Models\baseconst\Salesunit;
use Illuminate\Database\Seeder;

class SalesunitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salesunit::create(
            ['salesunit_description' => '1 BHK', 'salesunit_abbr' => '1BHK']
        );
        Salesunit::create(
            ['salesunit_description' => '2 BHK', 'salesunit_abbr' => '2BHK']
        );
        Salesunit::create(
            ['salesunit_description' => '2 BHK + T', 'salesunit_abbr' => '2BHKT']
        );
        Salesunit::create(
            ['salesunit_description' => 'Shop','salesunit_abbr' => 'SHP']
        );
        Salesunit::create(
            ['salesunit_description' => 'Office','salesunit_abbr' => 'OFF']
        );
        Salesunit::create(
            ['salesunit_description' => '3 BHK','salesunit_abbr' => '3BHK']
        );
        Salesunit::create(
            ['salesunit_description' => '3 BHK + T','salesunit_abbr' => '3BHKT']
        );

    }
}


