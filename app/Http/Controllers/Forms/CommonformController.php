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


}
