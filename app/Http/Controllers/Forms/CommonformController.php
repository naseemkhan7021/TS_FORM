<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonformController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index_company()
    {
        return view('common-forms.company.index');

    }


    public function index_department()
    {
        return view('common-forms.department.index');

    }

    public function index_defaultdata()
    {
        return view('common-forms.defaultdata.index');

    }

    public function index_project()
    {
        return view('common-forms.project.index');
    }

    public function index_documentserial()
    {
        return view('common-forms.document_series.index');
    }

    public function index_InjuryTo()
    {
        return view('common-forms.Injuryto.index');
    }

    public function index_Prioritytimescale()
    {
        return view('common-forms.prioritytimescale.index');
    }


}
