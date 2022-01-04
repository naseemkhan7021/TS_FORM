<?php

namespace Database\Seeders;

use App\Models\forms_01\sub_cause;
use Illuminate\Database\Seeder;

class SubCauses01Seeder extends Seeder
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
            ['sub_causes_description' => 'Layout in open ground', 'sub_causes_abbr' => 'LOG','sub_causes_fk'=>1],
            ['sub_causes_description' => 'Unawareness', 'sub_causes_abbr' => 'Uns','sub_causes_fk'=>2],
            ['sub_causes_description' => 'Negligence', 'sub_causes_abbr' => 'Nc','sub_causes_fk'=>3],
        ];

        sub_cause::insert($data);
    }
}
