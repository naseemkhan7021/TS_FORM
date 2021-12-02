<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            ['role_title' => 'Guest User', 'role_abbr' => 'GU']
        );
        Role::create(
            ['role_title' => 'Developer', 'role_abbr' => 'DV']
        );
        Role::create(
            ['role_title' => 'Management', 'role_abbr' => 'MG']
        );
        Role::create(
            ['role_title' => 'Department Head','role_abbr' => 'DH']
        );
        Role::create(
            ['role_title' => 'Department Staff','role_abbr' => 'DS']
        );
    }
}
