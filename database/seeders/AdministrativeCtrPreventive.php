<?php

namespace Database\Seeders;

use App\Models\forms_01\administrative_control_preventive;
use Illuminate\Database\Seeder;

class AdministrativeCtrPreventive extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['administrative_control_preventive_description'=>'Admin Preventive 1','administrative_control_preventive_abbr'=>'AP1','administrative_control_preventive_value'=>'1'],
            ['administrative_control_preventive_description'=>'Admin Preventive 2','administrative_control_preventive_abbr'=>'AP2','administrative_control_preventive_value'=>'2'],
        ];
        //
        administrative_control_preventive::insert($data);
    }
}
