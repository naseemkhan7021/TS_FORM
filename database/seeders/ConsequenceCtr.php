<?php

namespace Database\Seeders;

use App\Models\forms_01\consequences_control;
use Illuminate\Database\Seeder;

class ConsequenceCtr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['consequences_controls_description'=>'Consequence Controle 1','consequences_controls_abbr'=>'CC1'],
            ['consequences_controls_description'=>'Consequence Controle 2','consequences_controls_abbr'=>'CC2'],
        ];
        //
        consequences_control::insert($data);
    }
}
