<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\projcon\Projectunits;
use App\Models\projcon\Projectwings;
use App\Models\baseconst\PaymentTemplateHead;

class DashboardPresales extends Component
{

    public $searchQuery;

    public $upd_projectname , $upd_wingdescription , $iID ;
    public $upd_sManagementUnitID, $upd_iTotalCarpetArea_sqft, $upd_iMarketValue_sqmt, $upd_iAgreementValue;
    public $upd_salesunit_description, $upd_iRate_sqft , $upd_mTotalFlatCost , $upd_mRegistration , $upd_mStampDuty ;
    public $upd_iCarpetArea_sqmt, $upd_mFlatCost, $upd_mDevelopmentCharges_amt , $upd_mDevelopmentCharges , $upd_mClubHouse;
    public $upd_iOtla_Area, $upd_iFloorRiseAmount, $upd_iTotalArea_sqft;
    public $upd_mParking, $upd_GST;

    public $upd_template_id;

    public function mount()
    {
        $this->searchQuery = '';

        $this->upd_iRate_sqft = 0;
        $this->upd_iTotalArea_sqft = 0;
        $this->upd_mFlatCost = 0;
        $this->upd_mTotalFlatCost = 0;
        $this->upd_mGrandTotal = 0;
    }

    public function render()
    {

        $projectwings = Projectwings::join('projects' , 'projects.ProjectID' , '=' , 'projectwings.iProjectID_FK')
        ->when($this->searchQuery != '', function($query) {
                $query->where('projectwings.bactive','1')
                ->where('sProjectName' , 'like' , '%'.$this->searchQuery.'%')
                ->orWhere('sLocation' , 'like' , '%'.$this->searchQuery.'%');
            })
        ->orderBy('projectwings.iProjectWingID','asc')
        ->get([ 'projects.*', 'projectwings.*' ]);


        $projectunits = Projectunits::where('projectunits.bactive','1')
        // ->where('projectunits.iID' , '=' , $this->iID)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*']);


        $paytemplate = PaymentTemplateHead::where('bactive','1')
        ->orderBy('templatehead_ID','desc')
        ->get();



        $projectsshops1 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 4)
        ->where('projectunits.iProjectWingID_FK' , '=' , 1)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);

        $projectsshops2 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 4)
        ->where('projectunits.iProjectWingID_FK' , '=' , 2)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);

        $projectsshops3 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 4)
        ->where('projectunits.iProjectWingID_FK' , '=' , 3)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);

        $projectsshops4 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 4)
        ->where('projectunits.iProjectWingID_FK' , '=' , 4)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);



        $projectsoffice1 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 5)
        ->where('projectunits.iProjectWingID_FK' , '=' , 1)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);


        $projectsoffice2 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 5)
        ->where('projectunits.iProjectWingID_FK' , '=' , 2)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);


        $projectsoffice3 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 5)
        ->where('projectunits.iProjectWingID_FK' , '=' , 3)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);

        $projectsoffice4 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.salesunitid_FK' , '=' , 5)
        ->where('projectunits.iProjectWingID_FK' , '=' , 4)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);



        $projectsrest1 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->whereNotIn('projectunits.salesunitid_FK' ,[4,5])
        ->where('projectunits.iProjectWingID_FK' , '=' , 1)
        ->orderBy('projectunits.iID','desc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);

        $projectsrest2 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->whereNotIn('projectunits.salesunitid_FK' ,[4,5])
        ->where('projectunits.iProjectWingID_FK' , '=' , 2)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);


        $projectsrest3 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->whereNotIn('projectunits.salesunitid_FK' ,[4,5])
        ->where('projectunits.iProjectWingID_FK' , '=' , 3)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);


        $projectsrest4 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->where('projectunits.bactive','1')
        ->whereNotIn('projectunits.salesunitid_FK' ,[4,5])
        ->where('projectunits.iProjectWingID_FK' , '=' , 4)
        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);


        $payschdata = DB::table('payschtables')->get();

        return view('livewire.dashboard.dashboard-presales',  [
            'projectsshops1'=>$projectsshops1,  'projectsshops2'=>$projectsshops2,
            'projectsshops3'=>$projectsshops3,  'projectsshops4'=>$projectsshops4,

            'projectsoffice1' => $projectsoffice1, 'projectsoffice2' => $projectsoffice2,
            'projectsoffice3' => $projectsoffice3, 'projectsoffice4' => $projectsoffice4,

            'projectsrest1'=> $projectsrest1 , 'projectsrest2'=> $projectsrest2 ,
            'projectsrest3'=> $projectsrest3 , 'projectsrest4'=> $projectsrest4 ,

           'projectwings' => $projectwings , 'payschdata'=> $payschdata,

           'projectunits' => $projectunits, 'paytemplate'=> $paytemplate,
        ]);
    }


    public function OpenAddCountryModal(){

        // $payschdata = DB::table('payschtables')->get();


        // $this->first_name = '';
        // $this->middle_name = '';
        // $this->last_name = '';
        // $this->full_name ='';
        // $this->email = '';
        // $this->mobile = '';
        // $this->required_sales_unit = '';
        // $this->company_name = '';
        // $this->occupation = '';
        // $this->designation = '';
        // $this->lead_feedback = '';
        // $this->current_leadstatus_id = 1 ;
        // $this->current_source_id = 0;
        // $this->current_propertystatus_id = 0;
        // $this->lead_min_range = 50 ;
        // $this->lead_max_range = 150 ;



        // $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    // public function UpdateUnit($UnitID)
    // {

    // }


    // https://www.tutsmake.com/laravel-8-pdf-generate-pdf-using-dompdf-example/

    public function OpenEditCountryModal($iID){

        // $payschdata = DB::table('payschtables')->get();

        $this->upd_iRate_sqft = 0;
        $this->upd_mTotalFlatCost = 0;
        $this->upd_mGrandTotal = 0;
        $this->upd_mFlatCost =  0;

        $info2 = Projectunits::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')
        ->join('projects' , 'projects.ProjectID' , '=' , 'projectunits.iProjectID_FK')
        ->where('projectunits.bactive','1')
        ->where('projectunits.iID' , '=' , $iID)
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' , 'projects.*'  ]);

        $this->upd_projectname = $info2[0]['sProjectName'];
        $this->upd_sManagementUnitID = $info2[0]['sManagementUnitID'];
        $this->upd_salesunit_description = $info2[0]['salesunit_description'];


        $this->upd_iTotalCarpetArea_sqft =  $info2[0]['iTotalCarpetArea_sqft'];
        $this->upd_iMarketValue_sqmt = $info2[0]['iMarketValue_sqmt'];
        $this->upd_iAgreementValue = $info2[0]['iAgreementValue'];
        $this->upd_wingdescription =  $info2[0]['sWingDescription'];


        $this->upd_mParking =   number_format($info2[0]['mParking'],0);
        $this->upd_mClubHouse =  number_format($info2[0]['mClubHouse'],0);

        // $this->upd_iRate_sqft =  number_format($info2[0]['iRate_sqft'],0);
        // $this->upd_mTotalFlatCost =  $info2[0]['mTotalFlatCost'];
        // $this->upd_mGrandTotal = $info2[0]['mGrandTotal'];
        $this->upd_mRegistration =  $info2[0]['mRegistration'];
        $this->upd_mStampDuty =   $info2[0]['mStampDuty'];

        // $this->upd_mFlatCost =  $info2[0]['mFlatCost'];
        $this->upd_mDevelopmentCharges_amt =   $info2[0]['mDevelopmentCharges_amt'];
        $this->upd_mDevelopmentCharges =   $info2[0]['mDevelopmentCharges'];
        $this->upd_mClubHouse =   $info2[0]['mClubHouse'];
        $this->upd_GST =   $info2[0]['mGST'];
        $this->upd_iOtla_Area = $info2[0]['iOtla_Area'];
        $this->upd_iFloorRiseAmount = number_format($info2[0]['iFloorRiseAmount'],0);
        $this->upd_iTotalArea_sqft = $info2[0]['iTotalArea_sqft'];





        // $this->cid = $info->iID;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'iID'=>$iID
        ]);
    }


    public function AgreementExport()
    {

    }

}
