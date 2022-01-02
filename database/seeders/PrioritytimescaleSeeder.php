<?php

namespace Database\Seeders;

use App\Models\common_forms\prioritytimescale;
use Illuminate\Database\Seeder;

class PrioritytimescaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *
     *
     */



    protected $topic_discusseds = [
        [ 'prioritytimescales_desc' => 'Immediately','prioritytimescales_abbr' => 'IMD',  'pt_value' => 1 ],
        [ 'prioritytimescales_desc' => '24 Hours','prioritytimescales_abbr' => '24H',  'pt_value' => 2 ],
        [ 'prioritytimescales_desc' => '3 Days','prioritytimescales_abbr' => '3D',  'pt_value' => 3 ],
        [ 'prioritytimescales_desc' => '7 Days ','prioritytimescales_abbr' => '7D',  'pt_value' => 4 ]
    ];


    public function run()
    {
        foreach($this->topic_discusseds as $td) {
            prioritytimescale::create($td);
        }
    }
}
