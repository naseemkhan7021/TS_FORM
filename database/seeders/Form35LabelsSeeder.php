<?php

namespace Database\Seeders;

use App\Models\forms_35\form35_labels;
use Illuminate\Database\Seeder;

class Form35LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        form35_labels::truncate();

        $ddd_data = [
            ['form35_labels_desc' => 'Special Instruction and restrictions, if any: Before issuing this permit ensure the relevant checklist has been filled and submitted to site EHS department (EHS-F-', 'form35_labels_abbr' => 'PA' ,] ,
            ['form35_labels_desc' => 'All the above checkpoints found OK. Permit is issued to carry out the required Height work', 'form35_labels_abbr' => 'LA',] ,
            ['form35_labels_desc' => 'I understood the Safety Requirements of the job and shall follow without fail', 'form35_labels_abbr' => 'SH',] ,
            ['form35_labels_desc' => 'All the checkpoints are verified and found OK. Work can be started.', 'form35_labels_abbr' => 'LLP',] ,
            ['form35_labels_desc' => 'To be filled in by Permit Receiver on completion of work and returned to Safety Department:', 'form35_labels_abbr' => 'SNP',] ,
            ['form35_labels_desc' => 'To be filled in by Authorized Person from the Safety Department:', 'form35_labels_abbr' => 'ESOK',] ,
            ['form35_labels_desc' => 'I have checked & certify the work completion. All the men and materials withdrawn', 'form35_labels_abbr' => 'APP',] ,
            ['form35_labels_desc' => "01) Ensure all labours / men’s working at height is trained for the same & tool box training should be              conducted prior to work. ", 'form35_labels_abbr' => 'DFL',] ,
            ['form35_labels_desc' => '02) "Understand work - Ensure Safety" before commencing work.', 'form35_labels_abbr' => 'SHS',] ,
            ['form35_labels_desc' => '03) The above permit is valid for the day only. Permit may be carried forward with the permission of the
            Issuing authority for the next day only.', 'form35_labels_abbr' => 'WP',] ,

            ['form35_labels_desc' => 'Name & Signature of Site Safety Officer: ______________________________________________', 'form35_labels_abbr' => 'B2WP',] ,
            ['form35_labels_desc' => 'Note: For continuation of permit, please notify authorized person 1 hour before expiry of permit.', 'form35_labels_abbr' => 'HM2WP',] ,

        ];

        form35_labels::insert($ddd_data);
    }
}
