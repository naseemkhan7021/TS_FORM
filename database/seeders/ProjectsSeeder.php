<?php

namespace Database\Seeders;

use App\Models\common_forms\Projects;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projects::create(
            ['ibc_id_fk' => '1', 'idepartment_id_fk' => '1' , 'sproject_name' => 'PROJECT NO 1' , 'sproject_abbr' => 'PRO1' , 'sproject_location' => 'VASHI NAVI MUMBAI']);
    }
}








