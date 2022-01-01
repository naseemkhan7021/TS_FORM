<?php

namespace App\Http\Livewire\Forms15;

use App\Models\common_forms\PotentialInjuryto;
use App\Models\forms_00\formdata_00;
use App\Models\forms_15\Activity15;
use App\Models\forms_15\Cause15;
use App\Models\forms_15\ContributingCause;
use App\Models\forms_15\formdata_15;
use App\Models\forms_15\ImdAction;
use App\Models\forms_15\ImdCorrection;
use App\Models\forms_15\NatureOfPotentialInjury;
use App\Models\forms_15\WhyunsafeactCommitted;
use App\Models\projcon\Project;
use Carbon\Carbon;
use Livewire\Component;

class Formdata15 extends Component
{

    protected $listeners = ['selectedProjectID'];

    public $searchQuery,$formSRNo, $role, $doincident_dt, $sproject_location, $showOtherInput,$d;

    public $iproject_id_fk,$document_id_fk,$idepartment_id_fk,$ibc_id_fk, $potential_injurytos_fk, $report_no, $potential_injurytos_other, $nature_of_potential_injuries_ids, $nature_of_potential_injuries_other, $activity15s_ids, $details_of_nearmiss, $imdcause15s_ids, $imdcause15s_other, $contributing_causes_ids, $contributing_causes_other, $whyunsafeact_committeds_ids, $whyunsafeact_committeds_other, $imd_actions_ids, $imd_corrections_ids, $further_recommended_action, $completed_by_name, $completed_by_signature, $completed_date;
    public $cid,$selectedProjectID;


    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }


    public function mount()
    {
        $this->searchQuery = '';
        $this->formSRNo = 15;
    }

    public function render()
    {

        $form15data = formdata_15::join('projects', 'projects.iproject_id', '=', 'formdata_15s.iproject_id_fk')
            // ->join('defaultdatas','defaultdatas.idefault_id','=','formdata_15s.idefault_id_fk')
            // ->join('companies','companies.ibc_id','=','formdata_15s.ibc_id_fk')
            // ->join('departments','departments.idepartment_id','=','formdata_15s.idepartment_id_fk')
            // ->join('documents','documents.document_id','=','formdata_15s.document_id_fk')
            ->join('potential_injurytos', 'potential_injurytos.potential_injurytos_id', '=', 'formdata_15s.potential_injurytos_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('completed_by_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('doincident_dt', 'like', '%' . $this->searchQuery . '%');
            })
            ->orderBy('formdata_15s_id')->paginate(10);
        // dd($form15data);

        $prjectData = Project::all();
        $potentialinjurytotData = PotentialInjuryto::all();
        $NatureofpotentialData = NatureOfPotentialInjury::all();
        $activityData = Activity15::all();
        $imdcauseData = Cause15::all();
        $contributcauseData = ContributingCause::all();
        $whyunsafeactcommittedsData = WhyunsafeactCommitted::all();
        $imdactionData = ImdAction::all();
        $imdcorrectionData = ImdCorrection::all();

        return view('livewire.forms15.formdata15', [
            'form15data' => $form15data, 'potentialinjurytotData' => $potentialinjurytotData, 'prjectData' => $prjectData, 'NatureofpotentialData' => $NatureofpotentialData, 'activityData' => $activityData, 'imdcauseData' => $imdcauseData, 'contributcauseData' => $contributcauseData, 'whyunsafeactcommittedsData' => $whyunsafeactcommittedsData, 'imdactionData' => $imdactionData, 'imdcorrectionData' => $imdcorrectionData,
        ]);
    }

    

    public function OpenAddCountryModal()
    {
        $this->doincident_dt = Carbon::now()->format('Y-m-d') . " " . Carbon::now()->format('H:i:s'); //Carbon::now();

        $this->iproject_id_fk = '';
        $this->potential_injurytos_fk = '';
        $this->report_no = '';
        $this->potential_injurytos_other = '';
        $this->nature_of_potential_injuries_other = '';
        $this->details_of_nearmiss = '';
        $this->imdcause15s_other = '';
        $this->contributing_causes_other = '';
        $this->whyunsafeact_committeds_other = '';
        $this->further_recommended_action = '';
        $this->completed_by_name = '';
        $this->completed_by_signature = '';
        $this->completed_date = '';
        $this->nature_of_potential_injuries_ids = collect();
        $this->activity15s_ids = collect();
        $this->imdcause15s_ids = collect();
        $this->contributing_causes_ids = collect();
        $this->whyunsafeact_committeds_ids = collect();
        $this->imd_actions_ids = collect();
        $this->imd_corrections_ids = collect();

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'iproject_id_fk' => 'required|not_in:0',
            'potential_injurytos_fk' => 'required',
            'report_no' => 'required',
            // 'potential_injurytos_other'=>'required',
            'nature_of_potential_injuries_ids' => 'required',
            // 'nature_of_potential_injuries_other'=>'required',
            'activity15s_ids' => 'required',
            'details_of_nearmiss' => 'required',
            'imdcause15s_ids' => 'required',
            // 'imdcause15s_other'=>'required',
            'contributing_causes_ids' => 'required',
            // 'contributing_causes_other'=>'required',
            'whyunsafeact_committeds_ids' => 'required',
            // 'whyunsafeact_committeds_other'=>'required',
            'imd_actions_ids' => 'required',
            'imd_corrections_ids' => 'required',
            'further_recommended_action' => 'required',
            'completed_by_name' => 'required',
            'completed_by_signature' => 'required',
            'completed_date' => 'required',
            'doincident_dt' => 'required',
        ]);

        $save = formdata_15::insert([
            'iproject_id_fk' => $this->iproject_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'ibc_id_fk' => $this->ibc_id_fk,
            'potential_injurytos_fk' => $this->potential_injurytos_fk,
            'report_no' => $this->report_no,
            'potential_injurytos_other' => $this->potential_injurytos_other,
            'nature_of_potential_injuries_ids' => implode(',', $this->nature_of_potential_injuries_ids),
            'nature_of_potential_injuries_other' => $this->nature_of_potential_injuries_other,
            'activity15s_ids' => implode(',', $this->activity15s_ids),
            'details_of_nearmiss' => $this->details_of_nearmiss,
            'imdcause15s_ids' => implode(',', $this->imdcause15s_ids),
            'imdcause15s_other' => $this->imdcause15s_other,
            'contributing_causes_ids' => implode(',', $this->contributing_causes_ids),
            'contributing_causes_other' => $this->contributing_causes_other,
            'whyunsafeact_committeds_ids' => implode(',', $this->whyunsafeact_committeds_ids),
            'whyunsafeact_committeds_other' => $this->whyunsafeact_committeds_other,
            'imd_actions_ids' => implode(',', $this->imd_actions_ids),
            'imd_corrections_ids' => implode(',', $this->imd_corrections_ids),
            'further_recommended_action' => $this->further_recommended_action,
            'completed_by_name' => $this->completed_by_name,
            'completed_by_signature' => $this->completed_by_signature,
            'completed_date' => $this->completed_date,
            'doincident_dt' => $this->doincident_dt,
        ]);
        

        if ($save) {
            // dd($save);
            $getCounter = formdata_00::where([
                'formdata_00s.iproject_id_fk' => $this->iproject_id_fk,
                'formdata_00s.idepartment_id_fk' => $this->idepartment_id_fk,
                'formdata_00s.ibc_id_fk' => $this->ibc_id_fk,
                'formdata_00s.sr_no' => $this->formSRNo
            ])->get('counter')[0]->counter + 1;
    
            $updateformsCounter = formdata_00::where([
                'formdata_00s.iproject_id_fk' => $this->iproject_id_fk,
                'formdata_00s.idepartment_id_fk' => $this->idepartment_id_fk,
                'formdata_00s.ibc_id_fk' => $this->ibc_id_fk,
                'formdata_00s.sr_no' => $this->formSRNo
            ])->update(['counter' => $getCounter]);
            if ($updateformsCounter) {
                # code...
                $this->dispatchBrowserEvent('CloseAddCountryModal');
                $this->resetValidation();
            }
        }
    }



    public function OpenEditCountryModal($formdata_15s_id, $role = 'Staff')
    {
        $info = formdata_15::find($formdata_15s_id);
        // dd($info);
        $this->role = $role;

        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->idepartment_id_fk = $info->idepartment_id_fk;
        $this->ibc_id_fk = $info->ibc_id_fk;
        $this->potential_injurytos_fk = $info->potential_injurytos_fk;
        $this->report_no = $info->report_no;
        $this->potential_injurytos_other = $info->potential_injurytos_other;
        $this->nature_of_potential_injuries_ids = explode(',', $info->nature_of_potential_injuries_ids);
        $this->nature_of_potential_injuries_other = $info->nature_of_potential_injuries_other;
        $this->activity15s_ids = explode(',', $info->activity15s_ids);
        $this->details_of_nearmiss = $info->details_of_nearmiss;
        $this->imdcause15s_ids = explode(',', $info->imdcause15s_ids);
        $this->imdcause15s_other = $info->imdcause15s_other;
        $this->contributing_causes_ids = explode(',', $info->contributing_causes_ids);
        $this->contributing_causes_other = $info->contributing_causes_other;
        $this->whyunsafeact_committeds_ids = explode(',', $info->whyunsafeact_committeds_ids);
        $this->whyunsafeact_committeds_other = $info->whyunsafeact_committeds_other;
        $this->imd_actions_ids = explode(',', $info->imd_actions_ids);
        $this->imd_corrections_ids = explode(',', $info->imd_corrections_ids);
        $this->further_recommended_action = $info->further_recommended_action;
        $this->completed_by_name = $info->completed_by_name;
        $this->completed_by_signature = $info->completed_by_signature;
        $this->completed_date = $info->completed_date;
        $this->doincident_dt = $info->doincident_dt;

        // dd('substandcondition_ids => ',$this->upd_substandcondition_ids, ' substandaction_ids => ',$this->upd_substandaction_ids);

        $this->cid = $info->formdata_15s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_15s_id' => $formdata_15s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'iproject_id_fk' => 'required|not_in:0',
            'potential_injurytos_fk' => 'required',
            'report_no' => 'required',
            // 'potential_injurytos_other'=>'required',
            'nature_of_potential_injuries_ids' => 'required',
            // 'nature_of_potential_injuries_other'=>'required',
            'activity15s_ids' => 'required',
            'details_of_nearmiss' => 'required',
            'imdcause15s_ids' => 'required',
            // 'imdcause15s_other'=>'required',
            'contributing_causes_ids' => 'required',
            // 'contributing_causes_other'=>'required',
            'whyunsafeact_committeds_ids' => 'required',
            // 'whyunsafeact_committeds_other'=>'required',
            'imd_actions_ids' => 'required',
            'imd_corrections_ids' => 'required',
            'further_recommended_action' => 'required',
            'completed_by_name' => 'required',
            'completed_by_signature' => 'required',
            'completed_date' => 'required',
            'doincident_dt' => 'required',
        ]);

        $update = formdata_15::find($cid)->update([
            'iproject_id_fk' => $this->iproject_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'ibc_id_fk' => $this->ibc_id_fk,
            'potential_injurytos_fk' => $this->potential_injurytos_fk,
            'report_no' => $this->report_no,
            'potential_injurytos_other' => $this->potential_injurytos_other,
            'nature_of_potential_injuries_ids' => implode(',', $this->nature_of_potential_injuries_ids),
            'nature_of_potential_injuries_other' => $this->nature_of_potential_injuries_other,
            'activity15s_ids' => implode(',', $this->activity15s_ids),
            'details_of_nearmiss' => $this->details_of_nearmiss,
            'imdcause15s_ids' => implode(',', $this->imdcause15s_ids),
            'imdcause15s_other' => $this->imdcause15s_other,
            'contributing_causes_ids' => implode(',', $this->contributing_causes_ids),
            'contributing_causes_other' => $this->contributing_causes_other,
            'whyunsafeact_committeds_ids' => implode(',', $this->whyunsafeact_committeds_ids),
            'whyunsafeact_committeds_other' => $this->whyunsafeact_committeds_other,
            'imd_actions_ids' => implode(',', $this->imd_actions_ids),
            'imd_corrections_ids' => implode(',', $this->imd_corrections_ids),
            'further_recommended_action' => $this->further_recommended_action,
            'completed_by_name' => $this->completed_by_name,
            'completed_by_signature' => $this->completed_by_signature,
            'completed_date' => $this->completed_date,
            'doincident_dt' => $this->doincident_dt,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            $this->resetValidation();
        }
    }



    public function deleteConfirm($formdata_15s_id)
    {
        $info = formdata_15::find($formdata_15s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->completed_by_name . '</strong>',
            'id' => $formdata_15s_id
        ]);
        // dd()
        // $this->delete($formdata_15s_id);
    }



    public function delete($formdata_15s_id)
    {
        $del =  formdata_15::find($formdata_15s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    public function clearValuesandValidation()
    {
        # validaton
        $this->resetValidation();
        # value
        $this->iproject_id_fk = '';
    }
}
