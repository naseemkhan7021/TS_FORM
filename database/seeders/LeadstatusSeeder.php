<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\baseconst\LeadStatus;

class LeadstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeadStatus::create(
            ['leadstatus_description' => 'Guest User', 'leadstatus_abbr' => 'GU']
        );
        LeadStatus::create(
            ['leadstatus_description' => 'Developer', 'leadstatus_abbr' => 'DV']
        );
        LeadStatus::create(
            ['leadstatus_description' => 'Management', 'leadstatus_abbr' => 'MG']
        );
        LeadStatus::create(
            ['leadstatus_description' => 'Department Head','leadstatus_abbr' => 'DH']
        );
        LeadStatus::create(
            ['leadstatus_description' => 'Department Staff','leadstatus_abbr' => 'DS']
        );
    }
}
