<?php

namespace Database\Seeders;

use App\Models\common_forms\Documents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documents::create(
            ['document_description' => 'General Document', 'issue_no' => '123','issue_dt'=>'1/12/2000','revision_no'=>'123','revision_date'=>'4/12/200']
        );
    }
}
