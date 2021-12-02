<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\baseconst\LeadSource;

class LeadsourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeadSource::create(
            ['source_description' => 'Newspaper Ad', 'source_abbr' => 'NEWAD']
        );
        LeadSource::create(
            ['source_description' => 'Pamphlets', 'source_abbr' => 'PAM']
        );
        LeadSource::create(
            ['source_description' => 'Friends & Relatives', 'source_abbr' => 'F&R']
        );
        LeadSource::create(
            ['source_description' => 'Walk in','source_abbr' => 'WI']
        );
        LeadSource::create(
            ['source_description' => 'SMS','source_abbr' => 'SMS']
        );
    }
}
