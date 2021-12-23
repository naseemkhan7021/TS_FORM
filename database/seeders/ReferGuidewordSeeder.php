<?php

namespace Database\Seeders;

use App\Models\forms_01\refer_guideword;
use Illuminate\Database\Seeder;

class ReferGuidewordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // saleem

        refer_guideword::truncate();

        $ddd_data = [
            ['refer_guidewords_desc' => 'Follow present control methods', 'refer_guidewords_abbr' => 'FPCM' ,] ,
            ['refer_guidewords_desc' => 'Continuous competent supervision', 'refer_guidewords_abbr' => 'CCS',] ,
            ['refer_guidewords_desc' => 'Training to personnel if required.', 'refer_guidewords_abbr' => 'TTPIFR',] ,
        ];

        refer_guideword::insert($ddd_data);



    }
}
