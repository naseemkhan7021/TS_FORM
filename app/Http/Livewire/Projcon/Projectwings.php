<?php

namespace App\Http\Livewire\Projcon;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projcon\Projectunits;
use App\Models\projcon\Projectwings as ProjectwingsModel;

class Projectwings extends Component
{

    use WithPagination;

    public $searchQuery;

    public $iProjectWingID;
    public $sWingDescription , $sWingAbbr , $iUnitsperfloor , $iOfficeW , $iShopsW,  $iFloors;

    public $upd_sWingDescription , $upd_sWingAbbr , $upd_iUnitsperfloor ,  $upd_iOfficeW , $upd_iShopsW,  $upd_iFloors;

    public $iProjectID_FK , $iProjectWingID_FK , $salesunitid_FK ,$iProjectUnitID , $sManagementUnitID ,$iCarpetArea_sqmt;
    public $iBuildUpFormula ,$iBuildArea_sqmt , $iOpenArea , $iStampDutyArea ,$iStampDutyArea2 , $iTotalCarpetArea_sqft, $iOtla_Area;
    public $iTotalArea_sqft , $iMarketRate_sqmt ,$iMarketValue_sqmt ,$iAgreementValue ,$iRate_sqft , $iFloorRiseRate  ,$iFloorRiseAmount ,$mFlatCost;
    public $mDevelopmentCharges, $mDevelopmentCharges_amt, $mParking , $mClubHouse, $mGST, $mTotalFlatCost, $mRegistration;
    public $mStampDuty, $mStampDutyPer, $mGrandTotal, $iSalesStatus_FK, $iConstStatus_FK, $iReserved_FK, $iMemberID_FK;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $projectwings = ProjectwingsModel::join('projects' , 'projects.ProjectID' , '=' , 'projectwings.iProjectID_FK')
        ->when($this->searchQuery != '', function($query) {
                $query->where('projectwings.bactive','1')
                ->where('sProjectName' , 'like' , '%'.$this->searchQuery.'%')
                ->orWhere('sLocation' , 'like' , '%'.$this->searchQuery.'%');
            })
        ->orderBy('projectwings.iProjectWingID','asc')
        ->get([ 'projects.*', 'projectwings.*' ]);



        // ->get([ 'projects.sProjectName' , 'projects.sLocation', 'projectwings.sWingDescription' ,'projectwings.iProjectID_FK' , 'projectwings.sWingAbbr' , 'projectwings.iProjectWingID'  , 'projectwings.iFloors' ]);


        // $projectwings = ProjectwingsModel::with(array('projects' => function($query) {
        //         $query->select('sProjectName','sLocation');
        //     }))
        //     ->when($this->searchQuery != '', function($query) {
        //     $query->where('bactive','1')
        //     ->where('sProjectName' , 'like' , '%'.$this->searchQuery.'%')
        //     ->orWhere('sLocation' , 'like' , '%'.$this->searchQuery.'%');
        // })
        // ->orderBy('iProjectWingID','desc')->paginate(10);

        return view('livewire.projcon.projectwings', [
            'projectwings'=>$projectwings,
        ]);


    }


    public function OpenAddCountryModal(){
        $this->sWingDescription = '';
        $this->sWingAbbr = '';
        $this->iFloors = 0;
        $this->iShopsW = 0;
        $this->iOfficeW = 0;
        $this->iUnitsperfloor = 0;
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'sWingDescription'=>'required',
             'sWingAbbr'=>'required',
             'iFloors'=> 'required|numeric|min:0|not_in:0',
             'iUnitsperfloor'=> 'required|numeric|min:0|not_in:0',
             'iShopsW'=> 'required|numeric|min:0|not_in:0',
             'iOfficeW'=> 'required|numeric|min:0|not_in:0',

        ],[

            'sWingDescription.required'=>'Enter Wing Description Required',
            'sLocation.required'=>'Enter Wing Abbrivation Required' ,
            'iFloors.required'=>'Enter Floor Required',
            'iUnitsperfloor.required'=>'Enter No. of Flat Per Floor Required',
        ]);

        $save = ProjectwingsModel::insert([
              'sWingDescription'=>$this->sWingDescription,
              'sWingAbbr'=>$this->sWingAbbr,
              'iFloors'=>$this->iFloors,
              'iUnitsperfloor'=>$this->iUnitsperfloor,
              'iShopsW'=>$this->iShopsW,
              'iOfficeW'=>$this->iOfficeW,

        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($iProjectWingID){
        $info = ProjectwingsModel::join('projects' , 'projects.ProjectID' , '=' , 'projectwings.iProjectID_FK')->find($iProjectWingID);

        $this->upd_sProjectName = $info->sProjectName;
        $this->upd_sLocation = $info->sLocation;

        $this->upd_sWingDescription = $info->sWingDescription;
        $this->upd_sWingAbbr = $info->sWingAbbr;
        $this->upd_iFloors = $info->iFloors;
        $this->upd_iUnitsperfloor = $info->iUnitsperfloor;

        $this->upd_iShopsW = $info->iShopsW;
        $this->upd_iOfficeW = $info->iOfficeW;

        $this->cid = $info->iProjectWingID;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'iProjectWingID'=>$iProjectWingID
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_sWingDescription'=>'required' ,
              'upd_sWingAbbr'=>'required',
              'upd_iFloors'=> 'required|numeric|min:0|not_in:0',
              'upd_iUnitsperfloor'=> 'required|numeric|min:0|not_in:0',
              'upd_iShopsW'=> 'required|numeric|min:0|not_in:0',
              'upd_iOfficeW'=> 'required|numeric|min:0|not_in:0',

        ],[

            'upd_sWingDescription.required'=>'Enter Wing Description Required',
            'upd_sWingAbbr.required'=>'Enter Wing Abbrivation Required',
            'upd_iFloors.required'=>'Enter Floor Required',
            'upd_iUnitsperfloor.required'=>'Enter No. of Flat Per Floor Required',

        ]);

        $update = ProjectwingsModel::find($cid)->update([
            'sWingDescription'=>$this->upd_sWingDescription,
            'sWingAbbr'=>$this->upd_sWingAbbr,
            'iUnitsperfloor'=>$this->upd_iUnitsperfloor,
            'iFloors'=>$this->upd_iFloors,
            'iShopsW'=>$this->upd_iShopsW,
            'iOfficeW'=>$this->upd_iOfficeW,



        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($iProjectWingID){
        $info = ProjectwingsModel::find($iProjectWingID);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->sProjectName.'</strong>',
            'id'=>$iProjectWingID
        ]);
    }




    public function delete($iProjectWingID){
        $del =  ProjectwingsModel::find($iProjectWingID)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }


    public function genShopUnits()
    {

        $iProjectWingID = $this->cid;

        $infoProject = ProjectwingsModel::join('projects' , 'projects.ProjectID' , '=' , 'projectwings.iProjectID_FK')->find($iProjectWingID);

        $shop = 1;
        $iWing = 0;

        for($shop = 1; $shop <= $infoProject->iShops; $shop++ )

        {

            if ((1 <= $shop) && ($shop <= 17))
            {
                $iWing = 1;
            }
            elseif ((18 <= $shop) && ($shop <= 32))
            {
                $iWing = 3;
            }
            elseif((33 <= $shop) && ($shop <= 38))
            {
                $iWing = 4;
            }


            $save = Projectunits::insert([
                'iProjectID_FK'=>$infoProject->iProjectID_FK,
                'iProjectWingID_FK'=>$infoProject->iProjectWingID,
                'salesunitid_FK'=> 4,
                'iProjectUnitID' => $iWing.'-S-' . sprintf("%02s", $shop),
                'sManagementUnitID' => 'S-' . sprintf("%02s", $shop),
                'iCarpetArea_sqmt' => 0,
                'iBuildUpFormula'=> 0,
                'iBuildArea_sqmt' => 0,
                'iOpenArea' => 0,
                'iStampDutyArea' => 0,
                'iStampDutyArea2' => 0,
                'iTotalCarpetArea_sqft' => 0,
                'iOtla_Area' => 0,
                'iTotalArea_sqft' => 0,
                'iMarketRate_sqmt' => 0,
                'iMarketValue_sqmt' => 0,
                'iAgreementValue' => 0,
                'iRate_sqft' => 0,
                'iFloorRiseRate' => 0,
                'iFloorRiseAmount' => 0,
                'mFlatCost' => 0,
                'mDevelopmentCharges' => 0,
                'mDevelopmentCharges_amt' => 0,
                'mParking' => 0,
                'mClubHouse' => 0,
                'mGST' => 0,
                'mTotalFlatCost' => 0,
                'mRegistration' => 0,
                'mStampDuty' => 0,
                'mStampDutyPer' => 0,
                'mGrandTotal' => 0,
                'iSalesStatus_FK' => 1,
                'iConstStatus_FK' => 1,
                'iReserved_FK' => 0,
                'iMemberID_FK' => 0,

            ]);
        }
        $this->dispatchBrowserEvent('CloseAddCountryModal');

    }



    public function genOfficeUnits()
    {

        $iProjectWingID = $this->cid;

        $infoProject = ProjectwingsModel::join('projects' , 'projects.ProjectID' , '=' , 'projectwings.iProjectID_FK')->find($iProjectWingID);

        $office = 1;
        $iWing = 0;

        for($office = 1; $office <= $infoProject->iOffice; $office++ )

        {

            if ((1 <= $office) && ($office <= 16))
        {
            $iWing = 1;
        }
        elseif ((17 <= $office) && ($office <= 30))
        {
            $iWing = 3;
        }
        elseif((31 <= $office) && ($office <= 38))
        {
            $iWing = 4;
        }


            $save = Projectunits::insert([
                'iProjectID_FK'=>$infoProject->iProjectID_FK,
                'iProjectWingID_FK'=>$infoProject->iProjectWingID,
                'salesunitid_FK'=> 5,
                'iProjectUnitID' => $iWing.'-O-' . sprintf("%02s", $office),
                'sManagementUnitID' => 'O-' . sprintf("%02s", $office),
                'iCarpetArea_sqmt' => 0,
                'iBuildUpFormula'=> 0,
                'iBuildArea_sqmt' => 0,
                'iOpenArea' => 0,
                'iStampDutyArea' => 0,
                'iStampDutyArea2' => 0,
                'iTotalCarpetArea_sqft' => 0,
                'iOtla_Area' => 0,
                'iTotalArea_sqft' => 0,
                'iMarketRate_sqmt' => 0,
                'iMarketValue_sqmt' => 0,
                'iAgreementValue' => 0,
                'iRate_sqft' => 0,
                'iFloorRiseRate' => 0,
                'iFloorRiseAmount' => 0,
                'mFlatCost' => 0,
                'mDevelopmentCharges' => 0,
                'mDevelopmentCharges_amt' => 0,
                'mParking' => 0,
                'mClubHouse' => 0,
                'mGST' => 0,
                'mTotalFlatCost' => 0,
                'mRegistration' => 0,
                'mStampDuty' => 0,
                'mStampDutyPer' => 0,
                'mGrandTotal' => 0,
                'iSalesStatus_FK' => 1,
                'iConstStatus_FK' => 1,
                'iReserved_FK' => 0,
                'iMemberID_FK' => 0,

            ]);
        }
        $this->dispatchBrowserEvent('CloseAddCountryModal');
    }



    public function GenerateUnits($iProjectWingID){

        $info = ProjectwingsModel::join('projects' , 'projects.ProjectID' , '=' , 'projectwings.iProjectID_FK')->find($iProjectWingID);

        $this->sProjectName = $info->sProjectName;
        $this->sLocation = $info->sLocation;

        $this->iNoofWings =$info->iNoofWings;
        $this->iShops =$info->iShops;
        $this->iOffice =$info->iOffice;

        $this->sWingDescription = $info->sWingDescription;
        $this->sWingAbbr = $info->sWingAbbr;
        $this->iFloors = $info->iFloors;
        $this->iUnitsperfloor = $info->iUnitsperfloor;

        $this->iShopsW = $info->iShopsW;
        $this->iOfficeW = $info->iOfficeW;

        $this->cid = $info->iProjectWingID;
        $this->dispatchBrowserEvent('OpenUnitGenerateModal',[
            'iProjectWingID'=>$iProjectWingID
        ]);

    }


    public function genResidentialUnits($iProjectWingID)
    {
        $iProjectWingID = $this->cid;

        $infoProject = ProjectwingsModel::join('projects' , 'projects.ProjectID' , '=' , 'projectwings.iProjectID_FK')->find($iProjectWingID);






    }
}
