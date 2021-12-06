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


    public function index_constructionstage()
    {
        return view('baseconst.constructionstage.index');
    }


    public function index_leadsource()
    {
        return view('baseconst.leadsource.index');
    }



    public function index_leadstatus()
    {
        return view('baseconst.leadstatus.index');
    }



    public function index_paymentmode()
    {
        return view('baseconst.paymentmode.index');
    }



    public function index_propertystatus()
    {
        return view('baseconst.propertystatus.index');
    }



    public function index_channelpartner()
    {
        return view('baseconst.channelpartner.index');
    }

    public function index_salesunit()
    {
        return view('baseconst.salesunit.index');
    }


    public function index_templatepayment()
    {
        return view('baseconst.templatepayment.index');
    }


    // ---------------------------------------------------------------------------------------------------

    public function index_leads()
    {
        return view('crmsales.leads.index');
    }


    public function index_leadfollowup()
    {
        return view('crmsales.leadfollowup.index');
    }


    public function index_primarymember()
    {
        return view('crmsales.primarymember.index');
    }


    public function index_secondarymember()
    {
        return view('crmsales.secondarymember.index');
    }



    // ---------------------------------------------------------------------------------------------------
    public function index_projects()
    {
        return view('projcon.projects.index');
    }


    public function index_projectwings()
    {
        return view('projcon.projectwings.index');
    }


    // ---------------------------------------------------------------------------------------------------


    public function index_projectunit()
    {
        return view('projcon.projectunit.index');
    }


    // ---------------------------------------------------------------------------------------------------


    public function dashboard_presales()
    {
        // $shopsunits = Projectunits::join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        // ->orderBy('projectunits.iID','asc')
        // ->get([ 'projectunits.*', 'projectwings.*' ]);

        // return view('dashboard.presales.index', compact('shopsunits'));
        return view('dashboard.presales.index');

    }



    public function dashboard_unitavailable()
    {
        return view('dashboard.sales.index');
    }


    public function dashboard_management()
    {
        return view('dashboard.management.index');
    }



     // ---------------------------------------------------------------------------------------------------



}
