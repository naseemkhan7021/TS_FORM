<?php

namespace App\Http\Livewire\Crmsales;

use Livewire\Component;
use App\Models\common\Gender;
use Livewire\WithFileUploads;
use App\Models\projcon\Projectunits;
use Illuminate\Support\Facades\Auth;
use App\Models\crmsales\PrimaryMember as PrimaryMemberModal;

class PrimaryMember extends Component
{

    use WithFileUploads;

    public $searchQuery;

    public $sMember_FirstName,     $sMember_MiddleName ,     $sMember_LastName;
    public $sMember_Fullname,     $sOccupation,     $sPanCard,     $sPanCard_Photo;
    public $sAadhaarCard,  $sAadhaarCard_Photo,      $iNationalityID_FK,     $iGenderID_FK;
    public $iPurchased_unitID_FK,     $sMobileNo1,     $sMobileNo2,      $sEmailID1;
    public $sEmailID2,     $sResidentialAddress1,     $sResidentialAddress2,     $sPinCode,     $sCity,     $dtDOBK,      $dtDOB;



    public $upd_sMember_FirstName,     $upd_sMember_MiddleName ,     $upd_sMember_LastName;
    public $upd_sMember_Fullname,     $upd_sOccupation,     $upd_sPanCard,     $upd_sPanCard_Photo;
    public $upd_sAadhaarCard,  $upd_sAadhaarCard_Photo,      $upd_iNationalityID_FK,     $upd_iGenderID_FK;
    public $upd_iPurchased_unitID_FK,     $upd_sMobileNo1,     $upd_sMobileNo2,      $upd_sEmailID1;
    public $upd_sEmailID2,     $upd_sResidentialAddress1,     $upd_sResidentialAddress2,     $upd_sPinCode,     $upd_sCity,     $upd_dtDOBK,      $upd_dtDOB;

    public $old_sAadhaarCard_Photo,$old_sPanCard_Photo;

    public function mount()
    {
        $this->searchQuery = '';


    }


    public function render()
    {

        $genderdata = Gender::where('genders.bactive','1')->get();

        $projectunits = Projectunits::where('projectunits.bactive','1')->where('projectunits.iSalesStatus_FK','1')->get();






        $primarymemberdata = PrimaryMemberModal::join('Projectunits' , 'Projectunits.iID' , '=' , 'primary_members.iPurchased_UnitID_FK')
            ->when($this->searchQuery != '', function($query) {
            $query->where('primary_members.bactive','1')
            ->where('sMember_FullName' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sMember_LastName' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sPanCard' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sAadhaarCard' , 'like' , '%'.$this->searchQuery.'%');

        })
        ->orderBy('iMemberID','desc')->paginate(10);


        return view('livewire.crmsales.primary-member' ,[
            'primarymemberdata' => $primarymemberdata, 'projectunits'=>$projectunits,'genderdata'=>$genderdata
        ]);
    }


    public function OpenAddCountryModal(){
        $this->sMember_FirstName = '';
        $this->sMember_MiddleName = '';
        $this->sMember_LastName = '';
        $this->sMember_Fullname ='';
        $this->sOccupation = '';
        $this->sPanCard = '';
        $this->sAadhaarCard = '';
        $this->iNationalityID_FK = '';
        $this->iGenderID_FK = '';
        $this->iPurchased_unitID_FK = '';
        $this->sMobileNo1 = '';
        $this->sEmailID1 = '' ;
        $this->sResidentialAddress1 = '';
        $this->sResidentialAddress2 = '';
        $this->sPinCode = '' ;
        $this->sPanCard_Photo = '';
        $this->sAadhaarCard_Photo = '';
        $this->sCity = '' ;
        $this->dtDOBK = '';
        $this->dtDOB = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'sMember_FirstName'=>'required',
             'sMember_MiddleName'=>'required',
             'sMember_LastName'=>'required',

            'iGenderID_FK.required'=>'Selecte Your Gender',
            'iPurchased_unitID_FK.required'=>'Selecte Unit' ,
            'dtDOBK.required'=>'Date of Boking is required' ,
            'dtDOB.required'=>'Date of birth is required' ,

             'sAadhaarCard'=>'required',
             'sPanCard'=>'required',


            //  'sEmailID1' => 'required|numeric|min:0|not_in:0',
            //  'sResidentialAddress1' => 'required|numeric|min:0|not_in:0',
            //  'sResidentialAddress2' => 'required|numeric|min:0|not_in:0',


        ],[

            'sMember_FirstName.required'=>'Enter First Name Required',
            'sMember_MiddleName.required'=>'Enter Middle Name  Required' ,
            'sMember_LastName.required'=>'Enter last Name  Required' ,

            'iGenderID_FK.required'=>'Selecte Your Gender',
            'iPurchased_unitID_FK.required'=>'Selecte Unit' ,
            'dtDOBK.required'=>'Date of Boking is required' ,
            'dtDOB.required'=>'Date of birth is required' ,

            'sAadhaarCard.required'=>'Enter Aadhaar Card  Required' ,
            'sPanCard.required'=>'Enter PAN Card  Required' ,


            // 'sEmailID1.required' => 'Select a Value from Combo Box',
            // 'sResidentialAddress1.required' => 'Select a Value from Combo Box',
            // 'sResidentialAddress2.required' => 'Select a Value from Combo Box',


        ]);


        if (!$this->sAadhaarCard_Photo == '')
        {

            $ap = $this->sAadhaarCard_Photo->store('public/photos/primary/ac');
        }
        else
        {
            $ap = '';
        }


        if (!$this->sPanCard_Photo == '')
        {
            $pp = $this->sPanCard_Photo->store('public/photos/primary/pc');
        }
        else{

            $pp = '';
        }



        // $ap = $this->sAadhaarCard_Photo->store('public/photos/primary/ac');
        // $pp = $this->sPanCard_Photo->store('public/photos/primary/pc');

        $save = PrimaryMemberModal::insert([
              'sMember_FirstName'=>$this->sMember_FirstName,
              'sMember_MiddleName'=>$this->sMember_MiddleName,
              'sMember_LastName'=>$this->sMember_LastName,
              'sOccupation'=>$this->sOccupation,
              'sMember_Fullname'=>$this->sMember_FirstName . ' ' .  $this->sMember_MiddleName . ' ' . $this->sMember_LastName,
              'sPanCard'=>$this->sPanCard,
              'sAadhaarCard'=>$this->sAadhaarCard,
              'iNationalityID_FK'=>1,
              'iGenderID_FK'=>$this->iGenderID_FK,
              'iPurchased_unitID_FK'=>$this->iPurchased_unitID_FK,
              'sMobileNo1'=>$this->sMobileNo1,
              'sEmailID1'=>$this->sEmailID1,
              'sResidentialAddress1'=>$this->sResidentialAddress1,
              'sResidentialAddress2'=>$this->sResidentialAddress2,
              'sPinCode'=>$this->sPinCode,
              'sCity'=>$this->sCity,
              'dtDOBK'=>$this->dtDOBK,
              'dtDOB'=>$this->dtDOB,
              'sAadhaarCard_Photo'=>$ap,
              'sPanCard_Photo'=>$pp,
              'user_created'=> Auth::user()->id,

        ]);

        // $updateprojectunit = DB::('PROJECTUNITS')->WHERE('iSalesStatus_FK' = 1)

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($iMemberID){
        $info = PrimaryMemberModal::find($iMemberID);


        // print_r(json_encode($info));

        $this->upd_sMember_FirstName = $info->sMember_FirstName;
        $this->upd_sMember_MiddleName = $info->sMember_MiddleName;
        $this->upd_sMember_LastName = $info->sMember_LastName;
        $this->upd_sMember_Fullname = $info->sMember_Fullname;
        $this->upd_sOccupation = $info->sOccupation;
        $this->upd_sPanCard = $info->sPanCard;
        $this->upd_sAadhaarCard = $info->sAadhaarCard;
        $this->upd_iNationalityID_FK = 1;
        $this->upd_iGenderID_FK = $info->iGenderID_FK;
        $this->upd_iPurchased_unitID_FK = $info->iPurchased_UnitID_FK;
        $this->upd_sMobileNo1 = $info->sMobileNo1;
        $this->upd_sEmailID1 = $info->sEmailID1;
        $this->upd_sResidentialAddress1 = $info->sResidentialAddress1;
        $this->upd_sResidentialAddress2 = $info->sResidentialAddress2;

        $this->upd_sPanCard_Photo ='';
        $this->upd_sAadhaarCard_Photo = '';

        $this->old_sPanCard_Photo = '';
        $this->old_sAadhaarCard_Photo = '';

        $this->old_sPanCard_Photo = $info->sPanCard_Photo;
        $this->old_sAadhaarCard_Photo = $info->sAadhaarCard_Photo;

        // $this->upd_sPanCard_Photo = $info->sPanCard_Photo;
        // $this->upd_sAadhaarCard_Photo = $info->sAadhaarCard_Photo;

        $this->upd_sPinCode = $info->sPinCode;
        $this->upd_sCity = $info->sCity;
        $this->upd_dtDOBK = $info->dtDOBK;
        $this->upd_dtDOB = $info->dtDOB;


        $this->cid = $info->iMemberID;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'iMemberID'=>$info->iMemberID
        ]);
    }


    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_sMember_FirstName'=>'required' ,
              'upd_sMember_MiddleName'=>'required',
              'upd_sMember_LastName'=>'required'
            //   'upd_sMember_Fullname'=> 'required'
        ],[

            'upd_sMember_FirstName.required'=>'Enter Project Name Required',
            'upd_sMember_MiddleName.required'=>'Enter Middle Name Required',
            'upd_sMember_LastName.required'=>'Enter Middle Name Required',
            // 'upd_sMember_Fullname.required'=>'Enter Full Name Required',

        ]);

        if (!$this->upd_sAadhaarCard_Photo == '')
        {

            $upd_ap = $this->upd_sAadhaarCard_Photo->store('public/photos/primary/ac');
        }
        else
        {
            $upd_ap = $this->old_sAadhaarCard_Photo;
        }


        if (!$this->upd_sPanCard_Photo == '')
        {
            $upd_pp = $this->upd_sPanCard_Photo->store('public/photos/primary/pc');
        }
        else{

            $upd_pp = $this->old_sPanCard_Photo;
        }

        // $upd_ap = $this->upd_sAadhaarCard_Photo->store('public/photos/primary/ac');
        // $upd_pp = $this->upd_sPanCard_Photo->store('public/photos/primary/pc');

        $update = PrimaryMemberModal::find($cid)->update([
              'sMember_FirstName'=>$this->upd_sMember_FirstName,
              'sMember_MiddleName'=>$this->upd_sMember_MiddleName,
              'sMember_LastName'=>$this->upd_sMember_LastName,
              'sOccupation'=>$this->upd_sOccupation,
              'sMember_Fullname'=>$this->upd_sMember_FirstName . ' ' .  $this->upd_sMember_MiddleName . ' ' . $this->upd_sMember_LastName,
              'sPanCard'=>$this->upd_sPanCard,
              'sAadhaarCard'=>$this->upd_sAadhaarCard,
              'iNationalityID_FK'=>1,
              'iGenderID_FK'=>$this->upd_iGenderID_FK,
              'iPurchased_unitID_FK'=>$this->upd_iPurchased_unitID_FK,
              'sMobileNo1'=>$this->upd_sMobileNo1,
              'sEmailID1'=>$this->upd_sEmailID1,
              'sResidentialAddress1'=>$this->upd_sResidentialAddress1,
              'sResidentialAddress2'=>$this->upd_sResidentialAddress2,
              'sPinCode'=>$this->upd_sPinCode,
              'sCity'=>$this->upd_sCity,
              'dtDOBK'=>$this->upd_dtDOBK,
              'dtDOB'=>$this->upd_dtDOB,
              'sAadhaarCard_Photo'=>$upd_ap,
              'sPanCard_Photo'=>$upd_pp,
              'user_updated'=> Auth::user()->id,


        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






}
