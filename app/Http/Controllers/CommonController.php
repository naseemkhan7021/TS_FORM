<?php

namespace App\Http\Controllers;

use App\Models\projcon\Projectunits;
use Illuminate\Http\Request;

class CommonController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index_gender()
    {
        return view('common.gender.index');

    }


    public function index_languages()
    {
        return view('common.language.index');
    }


    public function index_nationality()
    {
        return view('common.nationality.index');
    }


    public function index_designation()
    {
        return view('common.designation.index');
    }


    public function index_occupation()
    {
        return view('common.occupation.index');
    }


    public function index_relationtype()
    {
        return view('common.relationtype.index');
    }


    public function index_addresstype()
    {
        return view('common.addresstype.index');
    }


    public function index_religion()
    {
        return view('common.religion.index');
    }


    public function index_qualification()
    {
        return view('common.qualification.index');
    }


    // ---------------------------------------------------------------------------------------------------




    // ---------------------------------------------------------------------------------------------------




    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------



    // ---------------------------------------------------------------------------------------------------






     // ---------------------------------------------------------------------------------------------------



}
