<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\activity;
use App\Models\forms_01\consequences_control;
use App\Models\forms_01\Formdata_01;
use App\Models\forms_01\potential_hazard;
use App\Models\forms_01\preventive_incident_control;
use App\Models\forms_01\probable_consequence;
use App\Models\forms_01\sub_activity;
use App\Models\projcon\Project;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Formdata01 extends Component
{
    use WithPagination;
    // normal field 
    public $M_any_legal_obligation_to_the_risk_assessment,$D_routine,$N_risk_quantum,$O_risk_acceptable_non_acceptable,$P_no_of_person_believed_to_be_affected,$Q_actions_as_per_hierarchy_of_control,$R_risk_probability,$S_risk_consequence,$T_duration,$U_risk_quantum,$V_risk_acceptable_non_acceptable;

    // all fk 
    public $ibc_id_fk,$idepartment_id_fk,$iproject_id_fk,$document_id_fk,$B_activity_id_fk,$C_sub_activity_id_fk,$E_potential_hazard_id_fk,$F_probable_consequence_id_fk,$G_causes_id_fk,$G1_sub_causes_id_fk,$H_preventive_incident_control_id_fk,$I_consequences_controls_id_fk,$J_risk_probability_id_fk,$K_risk_consequence_id_fk,$L_duration_of_exposure_id_fk,$engineering_control_id_fk,$administrative_control_preventive_id_fk,$administrative_control_mitigative_id_fk;

    public $searchQuery,$sproject_location,$currentData;
    
    
    // public $upd_M_any_legal_obligation_to_the_risk_assessment,
    //        $upd_N_risk_quantum,
    //        $upd_O_risk_acceptable_non_acceptable,
    //        $upd_P_no_of_person_believed_to_be_affected,
    //        $upd_Q_actions_as_per_hierarchy_of_control,
    //        $upd_R_risk_probability,
    //        $upd_S_risk_consequence,
    //        $upd_T_duration,
    //        $upd_U_risk_quantum,
    //        $upd_V_risk_acceptable_non_acceptable;


    public function mount()
    {
        $this->searchQuery = '';
        // $this->iproject_id_fk = session('globleSelectedProjectID');

    }

    public function render()
    {
        $formdata01 = Formdata_01::join('companies', 'companies.ibc_id', '=', 'formdata_01s.ibc_id_fk')
            // idepartment_id_fk
            ->join('departments', 'departments.idepartment_id', '=', 'formdata_01s.idepartment_id_fk')
            // iproject_id_fk
            ->join('projects', 'projects.iproject_id', '=', 'formdata_01s.iproject_id_fk')
            // document_id_fk
            ->join('documents', 'documents.document_id', '=', 'formdata_01s.document_id_fk')
            // B_activity_id_fk
            ->join('activities', 'activities.activity_id', '=', 'formdata_01s.B_activity_id_fk')
            // C_sub_activity_id_fk
            ->join('sub_activities', 'sub_activities.sub_activity_id', '=', 'formdata_01s.C_sub_activity_id_fk')
            // E_potential_hazard_id_fk
            ->join('potential_hazards', 'potential_hazards.potential_hazard_id', '=', 'formdata_01s.E_potential_hazard_id_fk')
            // F_probable_consequence_id_fk
            ->join('probable_consequences', 'probable_consequences.probable_consequence_id', '=', 'formdata_01s.F_probable_consequence_id_fk')
            // G_causes_id_fk
            ->join('causes', 'causes.causes_id', '=', 'formdata_01s.G_causes_id_fk')
            // G1_sub_causes_id_fk
            ->join('sub_causes', 'sub_causes.sub_causes_id', '=', 'formdata_01s.G1_sub_causes_id_fk')
            // H_preventive_incident_control_id_fk
            ->join('preventive_incident_controls', 'preventive_incident_controls.preventive_incident_control_id', '=', 'formdata_01s.H_preventive_incident_control_id_fk')
            // I_consequences_controls_id_fk
            ->join('consequences_controls', 'consequences_controls.consequences_controls_id', '=', 'formdata_01s.I_consequences_controls_id_fk')
            // J_risk_probability_id_fk
            ->join('risk_probabilities', 'risk_probabilities.risk_probability_id', '=', 'formdata_01s.J_risk_probability_id_fk')
            // K_risk_consequence_id_fk
            ->join('risk_consequences', 'risk_consequences.risk_consequence_id', '=', 'formdata_01s.K_risk_consequence_id_fk')
            // L_duration_of_exposure_id_fk
            ->join('duration_of_exposures', 'duration_of_exposures.duration_of_exposure_id', '=', 'formdata_01s.L_duration_of_exposure_id_fk')
            // engineering_control_id_fk
            ->join('engineering_controls', 'engineering_controls.engineering_control_id', '=', 'formdata_01s.engineering_control_id_fk')
            // administrative_control_preventive_id_fk
            ->join('administrative_control_preventives', 'administrative_control_preventives.administrative_control_preventive_id', '=', 'formdata_01s.administrative_control_preventive_id_fk')
            // administrative_control_mitigative_id_fk
            ->join('administrative_control_mitigatives', 'administrative_control_mitigatives.administrative_control_mitigative_id', '=', 'formdata_01s.administrative_control_mitigative_id_fk')


            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('M_any_legal_obligation_to_the_risk_assessment', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('D_routine', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('N_risk_quantum', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('O_risk_acceptable_non_acceptable', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('P_no_of_person_believed_to_be_affected', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('Q_actions_as_per_hierarchy_of_control', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('R_risk_probability', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('S_risk_consequence', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('T_duration', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('U_risk_quantum', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('V_risk_acceptable_non_acceptable', 'like', '%', $this->searchQuery . '%');
            })->orderBy('formdata_01s_id', 'asc')->paginate(10);

        $prjectData = Project::get();
        $activity01Data = activity::get();
        $subactivity01Data = sub_activity::where('activity_id_fk','=',$this->B_activity_id_fk)->get();
        $potentialHazardData = potential_hazard::get();
        $probableConsequenceData = probable_consequence::get();
        $preventiveinciData = preventive_incident_control::get();
        $consequencesCrlData = consequences_control::get();
            // dd($subactivity01Data);
        return view('livewire.forms01.formdata01', [
            'formdata01' => $formdata01, 'prjectData' => $prjectData,'activity01Data'=>$activity01Data,'subactivity01Data'=>$subactivity01Data,'potentialHazardData'=>$potentialHazardData,'probableConsequenceData'=>$probableConsequenceData,'preventiveinciData'=>$preventiveinciData,'consequencesCrlData'=>$consequencesCrlData
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->currentData = Carbon::now()->format('Y-m-d') ." ". Carbon::now()->format('H:i:s');
        // $this->iproject_id_fk = session('globleSelectedProjectID');
        $this->D_routine = 'R';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }
}
