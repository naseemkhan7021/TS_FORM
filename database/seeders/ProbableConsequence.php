<?php

namespace Database\Seeders;

use App\Models\forms_01\probable_consequence;
use Illuminate\Database\Seeder;

class ProbableConsequence extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['probable_consequence_description'=>'Probable Consequence 1','probable_consequence_abbr'=>'PC'],
            ['probable_consequence_description'=>'Probable Consequence 2','probable_consequence_abbr'=>'PC'],
            ['probable_consequence_description'=>'Probable Consequence 3','probable_consequence_abbr'=>'PC'],
        ];
        //
        probable_consequence::insert($data);
    }
}
