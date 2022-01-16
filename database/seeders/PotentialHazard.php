<?php

namespace Database\Seeders;

use App\Models\forms_01\potential_hazard;
use Illuminate\Database\Seeder;

class PotentialHazard extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['potential_hazard_description'=>'Potential Hasard 1','potential_hazard_abbr'=>'PH1'],
            ['potential_hazard_description'=>'Potential Hasard 2','potential_hazard_abbr'=>'PH2'],
            ['potential_hazard_description'=>'Potential Hasard 3','potential_hazard_abbr'=>'PH3'],
        ];
        //
        potential_hazard::insert($data);
    }
}
