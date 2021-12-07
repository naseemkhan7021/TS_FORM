<?php

namespace Database\Seeders;

use App\Models\common_forms\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(
            ['sdepartment_name' => 'INTEGRATED MANAGEMENT SYSTEM', 'sdepartment_abbr' => 'IMS' , 'ibc_id_fk' => '1' ]);
    }
}




