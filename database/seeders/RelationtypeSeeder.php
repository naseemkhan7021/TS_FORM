<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\common\Relationtype;

class RelationtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relationtype::create(
            ['relationtype_description' => 'Self', 'relationtype_abbr' => 'SELF']
        );
        Relationtype::create(
            ['relationtype_description' => 'Spouse', 'relationtype_abbr' => 'SPOUSE']
        );
        Relationtype::create(
            ['relationtype_description' => 'Father', 'relationtype_abbr' => 'FAT']
        );
        Relationtype::create(
            ['relationtype_description' => 'Mother','relationtype_abbr' => 'MOT']
        );
        Relationtype::create(
            ['relationtype_description' => 'Son','relationtype_abbr' => 'SON']
        );
        Relationtype::create(
            ['relationtype_description' => 'Daughter','relationtype_abbr' => 'DGH']
        );
        Relationtype::create(
            ['relationtype_description' => 'Uncle','relationtype_abbr' => 'UNC']
        );
        Relationtype::create(
            ['relationtype_description' => 'Aunt','relationtype_abbr' => 'AUNT']
        );
    }
}
