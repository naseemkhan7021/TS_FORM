<?php

namespace Database\Seeders;

use App\Models\forms_01\cause;
use Illuminate\Database\Seeder;

class causes01Seeder extends Seeder
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
            ['causes_description' => 'Technical', 'causes_abbr' => 'Tc'],
            ['causes_description' => 'Human', 'causes_abbr' => 'Hm'],
            ['causes_description' => 'Behavioural', 'causes_abbr' => '	Br'],
        ];

        cause::insert($data);
    }
}
