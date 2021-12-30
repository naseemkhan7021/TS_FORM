<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\forms_35\form35_checkpoint;

class Form35CheckpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         form35_checkpoint::truncate();

        $ddd_data = [
            ['form35_checkpoints_desc' => 'Proper Access', 'form35_checkpoints_abbr' => 'PA' ,] ,
            ['form35_checkpoints_desc' => 'Ladder Attendant', 'form35_checkpoints_abbr' => 'LA',] ,
            ['form35_checkpoints_desc' => 'Safety Harness', 'form35_checkpoints_abbr' => 'SH',] ,
            ['form35_checkpoints_desc' => 'Life line Provided', 'form35_checkpoints_abbr' => 'LLP',] ,
            ['form35_checkpoints_desc' => 'Safety Net Provided', 'form35_checkpoints_abbr' => 'SNP',] ,
            ['form35_checkpoints_desc' => 'Electrical Safety OK? ', 'form35_checkpoints_abbr' => 'ESOK',] ,
            ['form35_checkpoints_desc' => 'Additional PPE Provided? (if req.) ', 'form35_checkpoints_abbr' => 'APP',] ,
            ['form35_checkpoints_desc' => 'Defect free ladder', 'form35_checkpoints_abbr' => 'DFL',] ,
            ['form35_checkpoints_desc' => 'Safety Helmets & Shoes', 'form35_checkpoints_abbr' => 'SHS',] ,
            ['form35_checkpoints_desc' => 'Working Platform (WP)', 'form35_checkpoints_abbr' => 'WP',] ,

            ['form35_checkpoints_desc' => 'Barrication to WP', 'form35_checkpoints_abbr' => 'B2WP',] ,
            ['form35_checkpoints_desc' => 'Handrail / mid-rail to WP', 'form35_checkpoints_abbr' => 'HM2WP',] ,
            ['form35_checkpoints_desc' => 'Toe board to WP', 'form35_checkpoints_abbr' => 'TB2MP',] ,
            ['form35_checkpoints_desc' => 'Warning signs?', 'form35_checkpoints_abbr' => 'WS',] ,


        ];

         form35_checkpoint::insert($ddd_data);
    }
}
