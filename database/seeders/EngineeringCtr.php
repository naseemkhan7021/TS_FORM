<?php

namespace Database\Seeders;

use App\Models\forms_01\engineering_control;
use Illuminate\Database\Seeder;

class EngineeringCtr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['engineering_control_description'=>'Engineering Controle 1','engineering_control_abbr'=>'EC1','engineering_control_value'=>'1'],
            ['engineering_control_description'=>'Engineering Controle 2','engineering_control_abbr'=>'EC2','engineering_control_value'=>'2'],
            ['engineering_control_description'=>'Engineering Controle 3','engineering_control_abbr'=>'EC3','engineering_control_value'=>'3'],
        ];
        //
        engineering_control::insert($data);
    }
}
