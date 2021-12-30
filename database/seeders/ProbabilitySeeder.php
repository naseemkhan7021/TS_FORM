<?php

namespace Database\Seeders;

use App\Models\forms_66\Probability;
use Illuminate\Database\Seeder;

class ProbabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $data = [
            [
                'probability_value' => '1', 'probability_description' => 'Very Low', 'probability_abbr' => 'VL', 'probability_detail' => 'Impact exist only during start up and shut down'
            ],

            [
                'probability_value' => '2', 'probability_description' => 'Low', 'probability_abbr' => 'LO', 'probability_detail' => 'Impact exist once in a month '
            ],
            [
                'probability_value' => '3', 'probability_description' => 'Medium', 'probability_abbr' => 'ME', 'probability_detail' => 'Impact exist once in fortnight'
            ],
            [
                'probability_value' => '4', 'probability_description' => 'High', 'probability_abbr' => 'HI', 'probability_detail' => 'Impact Exists once in a week'
            ],
            [
                'probability_value' => '5', 'probability_description' => 'Very High', 'probability_abbr' => 'VH', 'probability_detail' => 'Impact exist several times a day'
            ],
        ];

        Probability::insert($data);
    }
}
