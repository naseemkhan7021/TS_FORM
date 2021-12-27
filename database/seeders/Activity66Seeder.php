<?php

namespace Database\Seeders;

use App\Models\forms_66\Activity66;
use Illuminate\Database\Seeder;

class Activity66Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        // Activity66::truncate();
        $activityData = [
            ['activity_description'=>'Project survey','activity_abbr'=>' PS'],
            ['activity_description'=>'Perimeter Guarding (Site Boundary)','activity_abbr'=>' PG'],
            ['activity_description'=>'Project office set up ','activity_abbr'=>' POS'],
            ['activity_description'=>'PCC and concreting by Transit Mixer (TM)  ','activity_abbr'=>' PAC'],
            ['activity_description'=>'Excavation','activity_abbr'=>'En'],
            ['activity_description'=>'Reinforcement Work','activity_abbr'=>' RW'],
            ['activity_description'=>'Bar bending & Bar cutting','activity_abbr'=>' BB'],
            ['activity_description'=>'Hot Work','activity_abbr'=>' HW'],
            ['activity_description'=>'Erection of steel reinforcement members','activity_abbr'=>' EOS'],
            ['activity_description'=>'Formwork- form preparation','activity_abbr'=>' FFP'],
            ['activity_description'=>'Formwork- Shuttering works','activity_abbr'=>' FSW'],
            ['activity_description'=>'Concreting by concrete pump','activity_abbr'=>' CBC'],
            ['activity_description'=>'Concreting by bucket','activity_abbr'=>' CBB'],
            ['activity_description'=>'Tower crane erection, operation & dismantling ','activity_abbr'=>' TCE'],
            ['activity_description'=>'Boom placer erection & operation','activity_abbr'=>' BPE'],
            ['activity_description'=>'Passenger cum material lift ','activity_abbr'=>' PCM'],
            ['activity_description'=>'Wall Drilling','activity_abbr'=>' WD'],
            ['activity_description'=>'Gas Cutting','activity_abbr'=>' GC'],
            ['activity_description'=>'Steel Bar Threading','activity_abbr'=>' SBT'],
            ['activity_description'=>'Finishing activity','activity_abbr'=>' FA'],
            ['activity_description'=>'Plumbing Work','activity_abbr'=>' PW'],
            ['activity_description'=>'Electrical Work','activity_abbr'=>' EW'],
            ['activity_description'=>'Masonry works','activity_abbr'=>' MW'],
            ['activity_description'=>'Painting','activity_abbr'=>'Pg'],
            ['activity_description'=>'Demobilizing of equipment','activity_abbr'=>' DOE'],
            ['activity_description'=>'Tower crane dismantling','activity_abbr'=>' TCD'],
            ['activity_description'=>'Dismantling of Boom placer','activity_abbr'=>' DOB'],
            ['activity_description'=>'Material Store','activity_abbr'=>' MS'],
            ['activity_description'=>'Labour camp','activity_abbr'=>' LC'],
            ['activity_description'=>'Person working in office','activity_abbr'=>' PWI'],
            ['activity_description'=>'Site and Labour camp general lighting ','activity_abbr'=>' SAL'],
            ['activity_description'=>'Site and Labour camp general consumption of water','activity_abbr'=>' SAL'],
            ['activity_description'=>'Employees coming in contact with Coronavirus COVID-19','activity_abbr'=>' ECI'],
        ];

        Activity66::insert($activityData);
    }
}
