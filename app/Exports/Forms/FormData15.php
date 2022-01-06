<?php

namespace App\Exports\Forms;

use App\Models\formdata_15;
use App\Models\forms_15\formdata_15 as Forms_15Formdata_15;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormData15 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Forms_15Formdata_15::all();
    }
}
