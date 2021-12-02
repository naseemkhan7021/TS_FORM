<?php

namespace App\Http\Livewire\Crmsales;

use File;
use Livewire\Component;
use App\Models\common\Gender;
use Livewire\WithFileUploads;
use App\Models\common\Relationtype;
use App\Models\projcon\Projectunits;
use Illuminate\Support\Facades\Auth;
use App\Models\crmsales\PrimaryMember;
use phpDocumentor\Reflection\Types\This;
use App\Models\crmsales\SecondaryMember as SecondaryMemberModal;

class SecondaryMember extends Component
{
    use WithFileUploads;
    public $searchQuery;
    public $sSecondary_FirstName,$sSecondary_MiddleName,$sSecondary_LastName,$sSecondary_FullName,$iMemberID_FK,$sOccupation_sc,$sPanCard_sc,$sPanCard_Photo_sc,$sAadhaarCard_sc,$sAadhaarCard_Photo_sc,$iNationalityID_FK,$iGenderID_FK,$iPurchased_UnitID_FK,$iRelationTypeID_FK,$sMobileNo1_sc,$sEmailID1_sc,$sResidentialAddress1_sc,$sResidentialAddress2_sc,$sPinCode_sc,$sCity_sc,$dtDOBK,$dtDOB_sc;
    public $upd_sSecondary_FirstName,$upd_sSecondary_MiddleName,$upd_sSecondary_LastName,$upd_sSecondary_FullName,$upd_iMemberID_FK,$upd_sOccupation_sc,$upd_sPanCard_sc,$upd_sPanCard_Photo_sc,$upd_sAadhaarCard_sc,$upd_sAadhaarCard_Photo_sc,$upd_iNationalityID_FK,$upd_iGenderID_FK,$upd_iPurchased_UnitID_FK,$upd_iRelationTypeID_FK,$upd_sMobileNo1_sc,$upd_sEmailID1_sc,$upd_sResidentialAddress1_sc,$upd_sResidentialAddress2_sc,$upd_sPinCode_sc,$upd_sCity_sc,$upd_dtDOBK,$upd_dtDOB_sc;
    public $prv_sAadhaarCard_Photo_sc;
    public $flatno , $bookingdate, $primarymember_name;

    public $old_sPanCard_Photo_sc , $old_sAadhaarCard_Photo_sc;

    public function mount()
    {
        $this->searchQuery = '';


    }
    public function clearOldAdhar(){
        $this->old_sAadhaarCard_Photo_sc = '';
    }
    public function clearOldPan(){
        $this->old_sPanCard_Photo_sc = '';
    }

    public function render()
    {

        $genderdata = Gender::where('genders.bactive','1')->get();

        $primerymemberdata = PrimaryMember::join('Projectunits' , 'Projectunits.iID' , '=' , 'primary_members.iPurchased_UnitID_FK')
        ->where('primary_members.bactive','1')->get();


        $relationtype = Relationtype::where('relationtypes.bactive','1')->get();

        $projectunits = Projectunits::where('projectunits.bactive','1')->get();

        $secondrymemberdata = SecondaryMemberModal::join('primary_members' , 'primary_members.iMemberID' , '=' , 'secondary_members.iMemberID_FK')
            ->join('Projectunits' , 'Projectunits.iID' , '=' , 'primary_members.iPurchased_UnitID_FK')
            ->when($this->searchQuery != '', function($query) {
            $query->where('secondary_members.bactive','1')
            ->where('sSecondary_FullName' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sSecondary_LastName' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sPanCard' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sAadhaarCard' , 'like' , '%'.$this->searchQuery.'%');

        })
        ->orderBy('iSecondary_MemberID','desc')->paginate(10);

        return view('livewire.crmsales.secondary-member',[
            'secondrymemberdata' => $secondrymemberdata,'genderdata'=>$genderdata,'projectunits'=>$projectunits,'primerymemberdata'=>$primerymemberdata,'relationtype'=>$relationtype
        ]);
    }

    public function OpenAddCountryModal(){
        $this->sSecondary_FirstName = '';
        $this->sSecondary_MiddleName = '';
        $this->sSecondary_LastName = '';
        $this->sSecondary_FullName ='';
        $this->sOccupation = '';
        $this->sPanCard = '';
        $this->sAadhaarCard = '';
        $this->sPanCard_Photo_sc ='';
        $this->AadhaarCard_Photo_sc ='';
        // $this->iNationalityID_FK = '';
        $this->iGenderID_FK = '';
        $this->iRelationTypeID_FK = '';
        $this->sMobileNo1 = '';
        $this->sEmailID1 = '' ;
        $this->sResidentialAddress1 = '';
        $this->sResidentialAddress2 = '';
        $this->sPinCode = '' ;
        $this->sCity = '' ;
        $this->dtDOBK = '';
        $this->dtDOB = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'sSecondary_FirstName'=>'required',
             'sSecondary_MiddleName'=>'required',
             'sSecondary_LastName'=>'required',

             'sAadhaarCard'=>'required',
             'sPanCard'=>'required',


            //  'sEmailID1' => 'required|numeric|min:0|not_in:0',
            //  'sResidentialAddress1' => 'required|numeric|min:0|not_in:0',
            //  'sResidentialAddress2' => 'required|numeric|min:0|not_in:0',


        ],[

            'sSecondary_FirstName.required'=>'Enter First Name Required',
            'sSecondary_MiddleName.required'=>'Enter Middle Name  Required' ,
            'sSecondary_LastName.required'=>'Enter last Name  Required' ,

            'sAadhaarCard.required'=>'Enter Aadhaar Card  Required' ,
            'sPanCard.required'=>'Enter PAN Card  Required' ,


            // 'sEmailID1.required' => 'Select a Value from Combo Box',
            // 'sResidentialAddress1.required' => 'Select a Value from Combo Box',
            // 'sResidentialAddress2.required' => 'Select a Value from Combo Box',


        ]);

        // $ap = url($this->sAadhaarCard_Photo_sc->store('photos','public'));
        // $pp = url($this->sPanCard_Photo_pr->store('photos', 'public'));



        if (!$this->sAadhaarCard_Photo_sc == '')
        {
            $ap = $this->sAadhaarCard_Photo_sc->store('public/photos/secondary/ac');

        }
        else{
            $ap = '';
        }
        if (!$this->sPanCard_Photo_sc == '')
        {
            $pp = $this->sPanCard_Photo_sc->store('public/photos/secondary/pc');
        }
        else{
            $pp = '';
        }


        $save = SecondaryMemberModal::insert([
              'sSecondary_FirstName'=>$this->sSecondary_FirstName,
              'sSecondary_MiddleName'=>$this->sSecondary_MiddleName,
              'sSecondary_LastName'=>$this->sSecondary_LastName,
              'sOccupation_sc'=>$this->sOccupation,
              'sSecondary_FullName'=>$this->sSecondary_FirstName . ' ' .  $this->sSecondary_MiddleName . ' ' . $this->sSecondary_LastName,
              'sPanCard_sc'=>$this->sPanCard,
              'sAadhaarCard_sc'=>$this->sAadhaarCard,
              'iNationalityID_FK'=>1,
              'iMemberID_FK'=>$this->iMemberID_FK,
              'iRelationTypeID_FK'=>$this->iRelationTypeID_FK,
              'iGenderID_FK'=>$this->iGenderID_FK,
              'sMobileNo1_sc'=>$this->sMobileNo1,
              'sEmailID1_sc'=>$this->sEmailID1,
              'sResidentialAddress1_sc'=>$this->sResidentialAddress1,
              'sResidentialAddress2_sc'=>$this->sResidentialAddress2,
              'sPinCode_sc'=>$this->sPinCode,
              'sCity_sc'=>$this->sCity,
              'dtDOBK'=>$this->dtDOBK,
              'dtDOB_sc'=>$this->dtDOB,
              'sAadhaarCard_Photo_sc'=>$ap,
              'sPanCard_Photo_sc'=>$pp,
              'user_created'=> Auth::user()->id,


        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($iSecondary_MemberID){
        $info = SecondaryMemberModal::join('primary_members' , 'primary_members.iMemberID' , '=' , 'secondary_members.iMemberID_FK')
        ->join('Projectunits' , 'Projectunits.iID' , '=' , 'primary_members.iPurchased_UnitID_FK')
        ->find($iSecondary_MemberID);





        $this->upd_iMemberID_FK = $info->iMemberID;
        $this->primarymember_name = $info->sMember_FullName;
        $this->upd_iRelationTypeID_FK = $info->iRelationTypeID_FK;
        $this->upd_sSecondary_FirstName = $info->sSecondary_FirstName;
        $this->upd_sSecondary_MiddleName = $info->sSecondary_MiddleName;
        $this->upd_sSecondary_LastName = $info->sSecondary_LastName;
        $this->upd_sSecondary_FullName = $info->sSecondary_FullName;
        $this->upd_sOccupation_sc = $info->sOccupation_sc;
        $this->upd_sPanCard_sc = $info->sPanCard_sc;
        $this->upd_sAadhaarCard_sc = $info->sAadhaarCard_sc;
        $this->upd_iNationalityID_FK = 1;
        $this->upd_iGenderID_FK = $info->iGenderID_FK;
        $this->upd_sMobileNo1_sc = $info->sMobileNo1_sc;
        $this->upd_sEmailID1_sc = $info->sEmailID1_sc;
        $this->upd_sResidentialAddress1_sc = $info->sResidentialAddress1_sc;
        $this->upd_sResidentialAddress2_sc = $info->sResidentialAddress2_sc;

        $this->upd_sPanCard_Photo_sc ='';
        $this->upd_sAadhaarCard_Photo_sc = '';

        $this->old_sPanCard_Photo_sc = '';
        $this->old_sAadhaarCard_Photo_sc = '';

        $this->old_sPanCard_Photo_sc = $info->sPanCard_Photo_sc;
        $this->old_sAadhaarCard_Photo_sc = $info->sAadhaarCard_Photo_sc;

        $this->upd_sPinCode_sc = $info->sPinCode_sc;
        $this->upd_sCity_sc = $info->sCity_sc;
        $this->upd_dtDOBK = $info->dtDOBK;
        $this->upd_dtDOB_sc = '2013-01-08'; //$info->dtDOB_sc->format('d-m-Y');
        $this->flatno = $info->sManagementUnitID;
        $this->bookingdate = $info->dtDOBK;

        $this->cid = $info->iSecondary_MemberID;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'iSecondary_MemberID'=>$info->iSecondary_MemberID
        ]);
    }


    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_sSecondary_FirstName'=>'required' ,
              'upd_sSecondary_MiddleName'=>'required',
              'upd_sSecondary_LastName'=>'required'
            //   'upd_sMember_Fullname'=> 'required'
        ],[

            'upd_sSecondary_FirstName.required'=>'Enter Project Name Required',
            'upd_sSecondary_MiddleName.required'=>'Enter Middle Name Required',
            'upd_sSecondary_LastName.required'=>'Enter Middle Name Required',
            // 'upd_sMember_Fullname.required'=>'Enter Full Name Required',

        ]);


        if (!$this->upd_sAadhaarCard_Photo_sc == '')
        {
            $upd_ap = $this->upd_sAadhaarCard_Photo_sc->store('public/photos/secondary/ac');

        }
        else{
            $upd_ap = $this->old_sAadhaarCard_Photo_sc;
        }
        if (!$this->upd_sPanCard_Photo_sc == '')
        {
            $upd_pp = $this->upd_sPanCard_Photo_sc->store('public/photos/secondary/pc');
        }
        else{
            $upd_pp = $this->old_sPanCard_Photo_sc;
        }

        $update = SecondaryMemberModal::find($cid)->update([
              'sSecondary_FirstName'=>$this->upd_sSecondary_FirstName,
              'sSecondary_MiddleName'=>$this->upd_sSecondary_MiddleName,
              'sSecondary_LastName'=>$this->upd_sSecondary_LastName,
              'sOccupation'=>$this->upd_sOccupation_sc,
              'sMember_Fullname'=>$this->upd_sSecondary_FirstName . ' ' .  $this->upd_sSecondary_MiddleName . ' ' . $this->upd_sSecondary_LastName,
              'sPanCard_sc'=>$this->upd_sPanCard_sc,
              'iRelationTypeID_FK'=>$this->upd_iRelationTypeID_FK,
              'sAadhaarCard_sc'=>$this->upd_sAadhaarCard_sc,
              'iNationalityID_FK'=>$this->upd_iNationalityID_FK,
              'iGenderID_FK'=>$this->upd_iGenderID_FK,
              'sMobileNo1_sc'=>$this->upd_sMobileNo1_sc,
              'sEmailID1_sc'=>$this->upd_sEmailID1_sc,
              'sResidentialAddress1_sc'=>$this->upd_sResidentialAddress1_sc,
              'sResidentialAddress2_sc'=>$this->upd_sResidentialAddress2_sc,
              'sPinCode_sc'=>$this->upd_sPinCode_sc,
              'sCity_sc'=>$this->upd_sCity_sc,
              'dtDOBK'=>$this->upd_dtDOBK,
              'dtDOB_sc'=>$this->upd_dtDOB_sc,
              'sAadhaarCard_Photo_sc'=>$upd_ap,
              'sPanCard_Photo_sc'=>$upd_pp,
              'user_updated'=> Auth::user()->id,


        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }





}
