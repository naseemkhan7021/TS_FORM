<?php

namespace Database\Seeders;

use App\Models\common_forms\Documents;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documents::create(
            ['document_description' => 'FIRST DOC', 'issue_no' => '01' , 'revision_no' => '01' , 'issue_dt' => '01.03.2020' , 'revision_date' => '01.03.2020' ]);
    }
}







