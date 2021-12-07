<?php

namespace Database\Seeders;

use App\Models\common_forms\Defaultdata;
use Illuminate\Database\Seeder;

class DefaultdataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Defaultdata::create(
            ['description' => 'FIRST DOC', 'ibc_id_fk' => '1' , 'idepartment_id_fk' => '1' , 'iproject_id_fk' => '1'  ]);
    }
}








