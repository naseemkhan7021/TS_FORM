<?php

namespace App\Http\Livewire\Crmsales;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\baseconst\LeadStatus;
use Illuminate\Support\Facades\Auth;
use App\Models\crmsales\ConversationMode;
use App\Models\crmsales\LeadFollowup as LeadFollowupModel;

class LeadFollowup extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchQuery;
    public $leadId;
    public $CustomerName;
    public $full_name,$staff_description,$lead_id_FK;

    public $upd_lead_ID , $upd_lead_fullname , $upd_lead_source_description , $upd_lead_mobile, $upd_lead_email , $upd_last_current_status ,  $upd_staff_feedback , $upd_followup_dt , $upd_staff_name ,$upd_staff_id;

    public $lead_newstatus_FK , $current_dt , $nextfollowup_dt , $modeofconversation_id_fk ;
    public $upd_last_current_status_id , $followup_id;

    public function mount()
    {
        $this->searchQuery = '';
        $this->leadId;
        $this->CustomerName;

    }



    public function render()
    {
        // $infodata2 = LeadFollowupModel::where('bactive2','1')->get();
        $leadstatus = LeadStatus::where('bactive','1')->get();
        $conversationmode = ConversationMode::where('bactive','1')->get();

        $leadfollowdata = LeadFollowupModel::join('leads' , 'leads.lead_id' , '=' , 'lead_followups.lead_id_FK')
        ->join('lead_statuses' , 'lead_statuses.leadstatus_id' , '=' , 'lead_followups.lead_oldstatus_FK')
        ->join('lead_statuses as lst' , 'lst.leadstatus_id' , '=' , 'lead_followups.lead_newstatus_FK')
        ->join('users' , 'users.id' , '=' , 'lead_followups.staff_id')
        ->where('lead_followups.bactive2','=' ,'1')
        ->when($this->searchQuery != '', function($query) {
            $query->where('lead_followups.bactive2','=' ,'1')
            ->where('full_name' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('staff_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('lead_feedback' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('iFollowUpID','desc')->paginate(5);


        $leadfollowdata2 = LeadFollowupModel::join('leads' , 'leads.lead_id' , '=' , 'lead_followups.lead_id_FK')
        ->join('lead_statuses' , 'lead_statuses.leadstatus_id' , '=' , 'lead_followups.lead_oldstatus_FK')
        ->join('lead_statuses as lst' , 'lst.leadstatus_id' , '=' , 'lead_followups.lead_newstatus_FK')
        ->join('users' , 'users.id' , '=' , 'lead_followups.staff_id')
        ->orderBy('iFollowUpID','desc')->get();



        return view('livewire.crmsales.lead-followup', [
            'leadfollowdata'=>$leadfollowdata, 'leadstatus'=> $leadstatus,'conversationmode'=>$conversationmode,
             'leadfollowdata2' => $leadfollowdata2,
        ]);
    }

    public function OpenEditCountryModal($iFollowUpID){
        $info = LeadFollowupModel::join('leads' , 'leads.lead_id' , '=' , 'lead_followups.lead_id_FK')
        ->join('lead_statuses' , 'lead_statuses.leadstatus_id' , '=' , 'lead_followups.lead_oldstatus_FK')
        ->join('lead_sources' , 'lead_sources.source_id' , '=' , 'leads.current_source_id')
        ->where('lead_followups.bactive2','1')
        ->find($iFollowUpID);

        $leadstatus = LeadStatus::where('bactive','1')->get();
        // $conversationmode = ConversationMode::where('bactive','1')->get();

        $this->followup_id = $iFollowUpID;
        $this->upd_lead_ID = $info->lead_id;
        $this->upd_lead_fullname = $info->full_name;
        $this->upd_lead_source_description = $info->source_description;
        $this->upd_lead_mobile = $info->mobile;

        $this->upd_lead_email = $info->email;
        $this->upd_last_current_status = $info->leadstatus_description;
        $this->upd_last_current_status_id = $info->lead_newstatus_FK;
        $this->upd_staff_feedback = $info->staff_description;
        $this->upd_staff_name = $info->staff_id;

        $this->current_dt =  Carbon::now()->format('d-m-Y');
        $this->lead_newstatus_FK = 0;
        $this->nextfollowup_dt = Carbon::now()->addDays(7)->format('d-m-Y');
        $this->modeofconversation_id_fk = 0;
        $this->staff_description = '';


        $this->cid = $info->iFollowUpID;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'iFollowUpID'=>$info->iFollowUpID, 'leadstatus'=> $leadstatus
        ]);
    }


    public function CutomerActivity($leadId,$costomerName)
    {
        $this->leadId = $leadId;
        $this->CustomerName = $costomerName;
        // $info = LeadFollowupModel::join('leads' , 'leads.lead_id' , '=' , 'lead_followups.lead_id_FK')
        // ->join('lead_statuses' , 'lead_statuses.leadstatus_id' , '=' , 'lead_followups.lead_oldstatus_FK')
        // ->join('lead_sources' , 'lead_sources.source_id' , '=' , 'leads.current_source_id')
        // ->where('lead_followups.bactive2','1');
        $info = LeadFollowupModel::orderBy('iFollowUpID','desc')->get('lead_followups.*');

       $this->dispatchBrowserEvent('CutomerActivity',[
           'info'=>$info,
       ]);

    }


    public function save(){
        $this->validate([
             'staff_description'=>'required',
             'nextfollowup_dt' => 'nullable|date',
             'lead_newstatus_FK' => 'required|numeric|min:0|not_in:0',


        ],[

            'staff_description.required'=>'Enter Description Required',
            'nextfollowup_dt.required'=>'Enter Valid Date  Required' ,
            'lead_newstatus_FK.required' => 'Select a Value from Combo Box',



        ]);

        // $lsfindold = Leadstatus::find($this->current_leadstatus_id);
        // $lsfindnew = Leadstatus::find($this->current_leadstatus_id);



        $update = LeadFollowupModel::find($this->followup_id)->update([
            'bactive2'=> '0',
        ]);


        $save = LeadFollowupModel::insert([
              'lead_id_FK'=> $this->upd_lead_ID,
              'current_dt'=> $this->current_dt,
              'lead_oldstatus_FK'=>$this->upd_last_current_status_id,
              'lead_newstatus_FK'=>$this->lead_newstatus_FK,
              'nextfollowup_dt'=>$this->nextfollowup_dt,
              'staff_id'=> Auth::user()->id,
              'staffhead_id'=>0,
              'management_id'=>0,
              'staff_description'=> Auth::user()->name . ' CHANGED Lead Status from '. $this->upd_last_current_status_id . 'to' . $this->lead_newstatus_FK . ' Desc : ' . $this->staff_description ,
              'staffhead_description'=>'NA',
              'management_description'=>'NA',
              'modeofconversation_id_fk'=> $this->modeofconversation_id_fk,
              'user_created'=> Auth::user()->id,
        ]);






        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }




}

