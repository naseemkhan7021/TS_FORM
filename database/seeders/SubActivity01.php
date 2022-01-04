<?php

namespace Database\Seeders;

use App\Models\forms_01\sub_activity;
use Illuminate\Database\Seeder;

class SubActivity01 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['sub_activity_description'=>'Ongoing work in excavated pit','sub_activity_abbr'=>	'OWEpit','activity_id_fk'=>1],
            ['sub_activity_description'=>'Work ongoing in excavation','sub_activity_abbr'=>	'WOG','activity_id_fk'=>2],
            ['sub_activity_description'=>'Layout for excavation of pit','sub_activity_abbr'=>	'LOE','activity_id_fk'=>3]
        ];

        sub_activity::insert($data);
    }
}
