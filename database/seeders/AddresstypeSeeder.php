<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\common\Addresstype;

class AddresstypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Addresstype::create(
            ['addresstype_description' => 'Residential Address', 'addresstype_abbr' => 'RA']);
        Addresstype::create(
            ['addresstype_description' => 'Office Address', 'addresstype_abbr' => 'OA']);
        Addresstype::create(
            ['addresstype_description' => 'Shop Address', 'addresstype_abbr' => 'SA']);
    }
}
