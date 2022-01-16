<?php

namespace Database\Seeders;

use App\Models\forms_01\duration_of_exposure;
use Illuminate\Database\Seeder;

class DurationOfExposure extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['duration_of_exposure_description'=>'Duration of Exposure 1','duration_of_exposure_abbr'=>'DE1','duration_of_exposure_value'=>'1'],
            ['duration_of_exposure_description'=>'Duration of Exposure 2','duration_of_exposure_abbr'=>'DE2','duration_of_exposure_value'=>'2'],
            ['duration_of_exposure_description'=>'Duration of Exposure 3','duration_of_exposure_abbr'=>'DE3','duration_of_exposure_value'=>'3'],
        ];
        //
        duration_of_exposure::insert($data);
    }
}
