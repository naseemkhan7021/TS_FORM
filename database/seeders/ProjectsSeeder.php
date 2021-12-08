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
            ['ibc_id_fk' => '1', 'idepartment_id_fk' => '1' , 'sproject_name' => 'PROJECT NO 2' , 'sproject_abbr' => 'PRO2' , 'sproject_location' => 'KHARGHAR NAVI MUMBAI']);
        Projects::create(
            ['ibc_id_fk' => '1', 'idepartment_id_fk' => '1' , 'sproject_name' => 'PROJECT NO 3' , 'sproject_abbr' => 'PRO3' , 'sproject_location' => 'BELAPUR NAVI MUMBAI']);
    }
}








