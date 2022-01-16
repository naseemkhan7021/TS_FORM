<?php

namespace Database\Seeders;

use App\Models\forms_01\preventive_incident_control;
use Illuminate\Database\Seeder;

class PreventiveIncidentCtr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['preventive_incident_control_description'=>'Prentive Incident Controle 1','preventive_incident_control_abbr'=>'PIC1'],
            ['preventive_incident_control_description'=>'Prentive Incident Controle 2','preventive_incident_control_abbr'=>'PIC2'],
            ['preventive_incident_control_description'=>'Prentive Incident Controle 3','preventive_incident_control_abbr'=>'PIC3'],
        ];
        //
        preventive_incident_control::insert($data);
    }
}
