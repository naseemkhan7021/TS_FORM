<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\common\Qualification;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Qualification::create(
            ['qualification_description' => 'Bachlors of Commerce', 'qualification_abbr' => 'B.COM']
        );
        Qualification::create(
            ['qualification_description' => 'Bachlors of Engineering', 'qualification_abbr' => 'B.TECH']
        );
    }
}
