<?php

namespace App\Http\Livewire\crmsales;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Log\Logger;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\baseconst\Salesunit;
use App\Models\baseconst\LeadSource;
use App\Models\Baseconst\Leadstatus;
use Illuminate\Support\Facades\Auth;
use App\Models\crmsales\LeadFollowup;
use App\Models\Baseconst\Propertystatus;
use App\Models\crmsales\Lead as leadModel;

class Leads extends Component
{
    public $searchQuery;

    public $lead_id;
    public $first_name , $middle_name , $last_name, $mobile, $full_name, $email, $required_sales_unit, $company_name, $occupation;
    public $designation, $lead_feedback, $current_leadstatus_id, $current_source_id , $registered_dt;
    public $current_propertystatus_id , $lead_min_range , $lead_max_range;
    public $residental_address, $dtfollowdate , $required_sales_unit_value;

    public $lead_current_range;

    public $upd_first_name , $upd_middle_name , $upd_last_name, $upd_full_name, $upd_mobile, $upd_email;
    public $upd_required_sales_unit, $upd_company_name, $upd_occupation;
    public $upd_designation, $upd_lead_feedback, $upd_current_leadstatus_id , $upd_registered_dt;
    public $upd_current_propertystatus_id , $upd_lead_min_range , $upd_lead_max_range, $upd_lead_current_range;
    public $upd_residental_address , $upd_dtfollowdate;

    public $selectedUnits=[] ;
    public $selectedUnit2s ;
    public $iRequiredUnit, $new_required_sales_unit;
    public $tempdb;

    // public $check_required_sales_unit_value;

    // public function __construct($selectedUnits)
    // {
    //     $this->selectedUnits = $selectedUnits;
    // }

    // protected $rules = [
    //     'selectedUnits.*' => 'required|string|min:2'
    // ];


    public function mount()
    {
        $this->searchQuery = '';
        $this->required_sales_unit_value = '';
        $this->registered_dt = Carbon::now();
        $this->iRequiredUnit = '';
        $this->selectedUnits = Collect();
        // $this->selectedUnits2 = Collect();

        // $this->selectedUnits = Salesunit::get();

    }

    public function render()
    {

        $leadstatus = Leadstatus::where('bactive','1')->get();
        $leadsource = LeadSource::where('bactive','1')->get();
        $propertystatus = Propertystatus::where('bactive','1')->get();
        $salesunits = Salesunit::where('bactive','1')->get();

        $leads = leadModel::join('lead_statuses' , 'lead_statuses.leadstatus_id' , '=' , 'leads.current_leadstatus_id')
            ->join('lead_sources' , 'lead_sources.source_id' , '=' , 'leads.current_source_id')
            ->when($this->searchQuery != '', function($query) {
            $query->where('leads.bactive','1')
            ->where('full_name' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('mobile' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('leadstatus_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('source_description' , 'like' , '%'.$this->searchQuery.'%');

        })
        ->orderBy('lead_id','desc')->paginate(10);

        return view('livewire.crmsales.leads', [
            'leads'=>$leads, 'leadstatus'=> $leadstatus, 'leadsource'=> $leadsource,
            'propertystatus'=> $propertystatus, 'salesunits' => $salesunits,
        ]);


    }




    public function unitClicked($id)
    {



        // echo $this->required_sales_unit_value.$id;



        // if ( $this->required_sales_unit_value[$id] > 0 )
        // {

        //     $contains = Str::contains($this->required_sales_unit, $this->required_sales_unit_value[$id] );
        //     if (!$contains)
        //     {
        //         $this->required_sales_unit = $this->required_sales_unit . $this->required_sales_unit_value[$id];
        //     }
        //     else
        //     {
        //         $this->required_sales_unit = str_replace($this->required_sales_unit_value[$id],"",$this->required_sales_unit);
        //     }
        // }
        // else
        // {
        //     $this->required_sales_unit = $this->required_sales_unit;
        // }


        // if ( $this->required_sales_unit == '')
        // {
        //     $this->required_sales_unit = $this->required_sales_unit_value[$id];
        // }
        // else
        // {
        //     $contains = Str::contains($this->required_sales_unit, $this->required_sales_unit_value[$id] );

        //     if ($contains)
        //     {
        //         if ( Str::length($this->required_sales_unit) == 1 )
        //         {
        //             $this->required_sales_unit = '';
        //         }
        //         $this->required_sales_unit = str_replace($this->required_sales_unit_value[$id],"",$this->required_sales_unit);
        //         $this->required_sales_unit = $this->required_sales_unit; // . ';' . $this->required_sales_unit_value[$id];
        //     }
        //     else
        //     {
        //         $this->required_sales_unit = $this->required_sales_unit . $this->required_sales_unit_value[$id]; // . $contains ;
        //     }

        // }
    }

    public function OpenAddCountryModal(){
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->full_name ='';
        $this->email = '';
        $this->residental_address = '';
        $this->mobile = '';
        $this->required_sales_unit = '';
        $this->company_name = '';
        $this->registered_dt = Carbon::now()->format('d-m-Y');
        $this->dtfollowdate = Carbon::now()->addDays(7)->format('d-m-Y');
        $this->occupation = '';
        $this->designation = '';
        $this->lead_feedback = '';
        $this->current_leadstatus_id = 1 ;
        $this->current_source_id = 0;
        $this->current_propertystatus_id = 0;
        $this->lead_min_range = 50 ;
        $this->lead_max_range = 500 ;
        $this->lead_current_range = 100;
        $this->required_sales_unit_value = '';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'first_name'=>'required',
             'middle_name'=>'required',
             'last_name'=>'required',
             'current_leadstatus_id' => 'required|numeric|min:0|not_in:0',
             'current_source_id' => 'required|numeric|min:0|not_in:0',
             'current_propertystatus_id' => 'required|numeric|min:0|not_in:0',

        ],[

            'first_name.required'=>'Enter First Name Required',
            'middle_name.required'=>'Enter Middle Name  Required' ,
            'last_name.required'=>'Enter last Name  Required' ,

            'current_leadstatus_id.required' => 'Select a Value from Combo Box',
            'current_source_id.required' => 'Select a Value from Combo Box',
            'current_propertystatus_id.required' => 'Select a Value from Combo Box',


        ]);

        $save = leadModel::insert([
              'first_name'=>$this->first_name,
              'middle_name'=>$this->middle_name,
              'last_name'=>$this->last_name,
              'email'=>$this->email,
              'full_name'=>$this->first_name . ' ' .  $this->middle_name . ' ' . $this->last_name,
              'mobile'=>$this->mobile,
              'residental_address'=>$this->residental_address,
              'required_sales_unit'=>implode(",",$this->selectedUnits),
              'dtfollowdate'=>$this->dtfollowdate,
              'company_name'=>$this->company_name,
              'occupation'=>$this->occupation,
              'designation'=>$this->designation,
              'lead_feedback'=>$this->lead_feedback,
              'current_leadstatus_id'=>$this->current_leadstatus_id,
              'current_source_id'=>$this->current_source_id,
              'current_propertystatus_id'=>$this->current_propertystatus_id,
              'lead_min_range'=>$this->lead_min_range,
              'lead_max_range'=>$this->lead_max_range,
              'lead_current_range'=>$this->lead_current_range,
              'user_created'=> Auth::user()->id,

        ]);

        $usp_leadtmpID = DB::getPdo()->lastInsertId();

        $lsfind = Leadstatus::find($this->current_leadstatus_id);

        $followup_data = LeadFollowup::insert([
            'lead_id_FK'=>$usp_leadtmpID,

            'lead_oldstatus_FK'=>$this->current_leadstatus_id,
            'lead_newstatus_FK'=>$this->current_leadstatus_id,

            'nextfollowup_dt'=>$this->dtfollowdate,

            'staff_id'=> Auth::user()->id,
            'staffhead_id'=>0,
            'management_id'=>0,

            'staff_description'=> Auth::user()->name . ' Added New Lead With Following Status ' . $lsfind->leadstatus_description,
            'staffhead_description'=>'NA',
            'management_description'=>'NA',

            'modeofconversation_id_fk'=>0,

            'user_created'=> Auth::user()->id,
        ]);



        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    public function OpenEditCountryModal($lead_id){
        $info = leadModel::find($lead_id);
        $this->upd_first_name = $info->first_name;
        $this->upd_middle_name = $info->middle_name;
        $this->upd_last_name = $info->last_name;
        $this->upd_full_name = $info->full_name;
        $this->upd_email = $info->email;
        $this->upd_mobile = $info->mobile;
        $this->upd_required_sales_unit = $info->required_sales_unit;
        $this->selectedUnit2s = Collect(preg_split("/\,/",$info->required_sales_unit));
        $this->upd_residental_address = $info->residental_address;
        $this->upd_company_name = $info->company_name;
        $this->upd_occupation = $info->occupation;
        $this->upd_designation = $info->designation;
        $this->upd_lead_feedback = $info->lead_feedback;
        $this->upd_current_leadstatus_id = $info->current_leadstatus_id;
        $this->upd_current_source_id = $info->current_source_id;
        $this->upd_current_propertystatus_id = $info->current_propertystatus_id;
        $this->upd_lead_min_range = $info->lead_min_range;
        $this->upd_lead_max_range = $info->lead_max_range;
        $this->upd_lead_current_range = $info->lead_current_range;

        $this->cid = $info->lead_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'lead_id'=>$info->lead_id,'info'=>$info,
        ]);
    }

    // public function addcheckValue($checkId){
    //     $salesunits = Salesunit::where('bactive','1')->get();
    //     foreach ($salesunits as $key) {
    //         # code...
    //         if($key['salesunit_id'] == $checkId) array_push($this->selectedUnits2,$checkId);
    //         else echo 'note';
    //     }
    // }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_first_name'=>'required' ,
              'upd_middle_name'=>'required',
              'upd_last_name'=>'required',
              'upd_full_name'=> 'required'
        ],[

            'upd_first_name.required'=>'Enter Project Name Required',
            'upd_middle_name.required'=>'Enter Middle Name Required',
            'upd_last_name.required'=>'Enter Middle Name Required',
            'upd_full_name.required'=>'Enter Full Name Required',

        ]);

        $update = leadModel::find($cid)->update([
            'first_name'=>$this->upd_first_name,
            'middle_name'=>$this->upd_middle_name,
            'last_name'=>$this->upd_last_name,
            'full_name'=>$this->upd_first_name . ' ' .  $this->upd_middle_name . ' ' . $this->upd_last_name,
            'email'=>$this->upd_email,
            'mobile'=>$this->upd_mobile,
            'required_sales_unit'=>implode(",",$this->selectedUnit2s),
            'residental_address'=>$this->upd_residental_address,
            'company_name'=>$this->upd_company_name,
            'occupation'=>$this->upd_occupation,
            'designation'=>$this->upd_designation,
            'lead_feedback'=>$this->upd_lead_feedback,
            'current_leadstatus_id'=>$this->upd_current_leadstatus_id,
            'current_source_id'=>$this->upd_current_source_id,
            'current_propertystatus_id' => $this->upd_current_propertystatus_id,
            'lead_min_range'=>$this->upd_lead_min_range,
            'lead_max_range'=>$this->upd_lead_max_range,
            'lead_current_range'=>$this->upd_lead_current_range,
            'user_updated'=> Auth::user()->id

        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($lead_id){
        $info = leadModel::find($lead_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->first_name.'</strong>',
            'id'=>$lead_id
        ]);
    }




    public function delete($lead_id){
        $del =  leadModel::find($lead_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }





}
