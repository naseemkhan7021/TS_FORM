<?php

namespace App\Exports\Forms;

// use App\Models\formdata_15;
// use App\Models\forms_15\formdata_15 as Forms_15Formdata_15;

use App\Models\forms_15\formdata_15;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

// FromCollection
class FormData15 implements FromView
{
    private $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
        // dd($this->formData);
    }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Form 15 pdf');
    //     $drawing->setDescription('This is only testing perpus');
    //     // $drawing->setPath(public_path('\assets\images\smalllogo.png'));
    //     // $drawing->setHeight(60);
    //     // dd($drawing);
    //     // asset('')
    //     return $drawing;
    // }

    // public function spredsheet()
    // {
    //     # code...
    //     $spreadsheet = new Spreadsheet();
    //     $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
    // }

    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     dd($this->formData);
    //     return $this->formData;
    // }

    public function view(): View
    {
        return view('exports.Forms.form15', [
            'formData' => $this->formData
        ]);
    }
}
