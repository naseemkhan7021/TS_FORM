<?php

namespace Database\Seeders;

use App\Models\forms_01\administrative_control_mitigative;
use Illuminate\Database\Seeder;

class AdministrativeCtrMitigative extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['administrative_control_mitigative_description'=>'Admin Controle 1','administrative_control_mitigative_abbr'=>'AC1','administrative_control_mitigative_value'=>'1'],
            ['administrative_control_mitigative_description'=>'Admin Controle 2','administrative_control_mitigative_abbr'=>'AC2','administrative_control_mitigative_value'=>'2'],
        ];
        //
        administrative_control_mitigative::insert($data);
    }
}
