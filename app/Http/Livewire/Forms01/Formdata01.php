<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\activity;
use App\Models\forms_01\administrative_control_mitigative;
use App\Models\forms_01\administrative_control_preventive;
use App\Models\forms_01\cause;
use App\Models\forms_01\consequences_control;
use App\Models\forms_01\duration_of_exposure;
use App\Models\forms_01\engineering_control;
use App\Models\forms_01\Formdata_01;
use App\Models\forms_01\potential_hazard;
use App\Models\forms_01\preventive_incident_control;
use App\Models\forms_01\probable_consequence;
use App\Models\forms_01\refer_guideword;
use App\Models\forms_01\risk_consequence;
use App\Models\forms_01\risk_probability;
use App\Models\forms_01\sub_activity;
use App\Models\forms_01\sub_cause;
use App\Models\projcon\Project;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Formdata01 extends Component
{
    use WithPagination;
    protected $listeners = ['selectedProjectID'];
    // normal field 
    public $M_any_legal_obligation_to_the_risk_assessment, $D_routine, $N_risk_quantum, $O_risk_acceptable_non_acceptable, $P_no_of_person_believed_to_be_affected, $Q_actions_as_per_hierarchy_of_control, $R_risk_probability, $S_risk_consequence, $T_duration, $U_risk_quantum, $V_risk_acceptable_non_acceptable;

    // all fk
    public $ibc_id_fk, $idepartment_id_fk, $iproject_id_fk, $document_id_fk, $B_activity_id_fk, $C_sub_activity_id_fk, $E_potential_hazard_id_fk, $F_probable_consequence_id_fk, $G_causes_id_fk, $G1_sub_causes_id_fk, $H_preventive_incident_control_id_fk, $I_consequences_controls_id_fk, $J_risk_probability_id_fk, $K_risk_consequence_id_fk, $L_duration_of_exposure_id_fk, $engineering_control_id_fk, $administrative_control_preventive_id_fk, $administrative_control_mitigative_id_fk;

    // collect property
    public $G1_sub_causes_id_fks = [];

    public $searchQuery, $sproject_location, $currentData, $ifnotAcceptable;
    public $selectedProjectID; // this id is globle available


    public function selectedProjectID($id)
    {
        // $id && $id == '*' ? dd($id) : '';
        # code...
        $this->selectedProjectID = $id;
    }

    public function mount()
    {
        $this->searchQuery = '';
        $this->ifnotAcceptable = false;
        // $this->G1_sub_causes_id_fks = collect();
        $this->Q_actions_as_per_hierarchy_of_control = collect();

        // $this->iproject_id_fk = session('globleSelectedProjectID');


    }

    public function render()
    {
        $formdata01 = Formdata_01::select('formdata_01s.created_at as hiraCreate', 'formdata_01s.*', 'projects.sproject_name', 'activities.activity_description', 'sub_activities.sub_activity_description', 'potential_hazards.potential_hazard_description', 'probable_consequences.probable_consequence_description', 'causes.causes_description', 'consequences_controls.consequences_controls_description')
            // ->join('companies', 'companies.ibc_id', '=', 'formdata_01s.ibc_id_fk')
            // idepartment_id_fk
            // ->join('departments', 'departments.idepartment_id', '=', 'formdata_01s.idepartment_id_fk')
            // iproject_id_fk
            ->join('projects', 'projects.iproject_id', '=', 'formdata_01s.iproject_id_fk')
            // document_id_fk
            // ->join('documents', 'documents.document_id', '=', 'formdata_01s.document_id_fk')
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
            // ->join('sub_causes', 'sub_causes.sub_causes_id', '=', 'formdata_01s.G1_sub_causes_id_fk')
            // H_preventive_incident_control_id_fk
            ->join('preventive_incident_controls', 'preventive_incident_controls.preventive_incident_control_id', '=', 'formdata_01s.H_preventive_incident_control_id_fk')
            // I_consequences_controls_id_fk
            ->join('consequences_controls', 'consequences_controls.consequences_controls_id', '=', 'formdata_01s.I_consequences_controls_id_fk')
            // J_risk_probability_id_fk
            // ->join('risk_probabilities', 'risk_probabilities.risk_probability_id', '=', 'formdata_01s.J_risk_probability_id_fk')
            // K_risk_consequence_id_fk
            // ->join('risk_consequences', 'risk_consequences.risk_consequence_id', '=', 'formdata_01s.K_risk_consequence_id_fk')
            // L_duration_of_exposure_id_fk
            // ->join('duration_of_exposures', 'duration_of_exposures.duration_of_exposure_id', '=', 'formdata_01s.L_duration_of_exposure_id_fk')
            // engineering_control_id_fk
            // ->join('engineering_controls', 'engineering_controls.engineering_control_id', '=', 'formdata_01s.engineering_control_id_fk')
            // administrative_control_preventive_id_fk
            // ->join('administrative_control_preventives', 'administrative_control_preventives.administrative_control_preventive_id', '=', 'formdata_01s.administrative_control_preventive_id_fk')
            // administrative_control_mitigative_id_fk
            // ->join('administrative_control_mitigatives', 'administrative_control_mitigatives.administrative_control_mitigative_id', '=', 'formdata_01s.administrative_control_mitigative_id_fk')
            ->when(session('globleSelectedProjectID') != '*', function ($data) {
                # code...
                $data->where('iproject_id_fk', '=', session('globleSelectedProjectID'));
            })
            // ->where('iproject_id_fk', '=', session('globleSelectedProjectID'))
            ->when($this->searchQuery != '', function ($query) {
                $query->where('formdata_01s.bactive', '1')
                    ->orWhere('projects.sproject_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('activities.activity_description', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sub_activities.sub_activity_description', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('potential_hazards.potential_hazard_description', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('probable_consequences.probable_consequence_description', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('causes.causes_description', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('consequences_controls.consequences_controls_description', 'like', '%', $this->searchQuery . '%')
                    ->orWhere('O_risk_acceptable_non_acceptable', 'like', '%', $this->searchQuery . '%');
            })->orderBy('formdata_01s_id', 'asc')->paginate(10);
        $data = [
            'formdata01' => $formdata01,
            'prjectData' => Project::get(),
            'activity01Data' => activity::get(),
            'subactivity01Data' => sub_activity::where('activity_id_fk', '=', $this->B_activity_id_fk)->get(),
            'cause01Data' => cause::get(),
            'subcause01Data' => sub_cause::where('sub_causes_fk', '=', $this->G_causes_id_fk)->get(),
            'potentialHazardData' => potential_hazard::get(),
            'probableConsequenceData' => probable_consequence::get(),
            'preventiveinciData' => preventive_incident_control::get(),
            'consequencesCrlData' => consequences_control::get(),
            'riskPorbabilityData' => risk_probability::get(),
            'riskConsequenceData' => risk_consequence::get(),
            'durationOfExpData' => duration_of_exposure::get(),
            'referGuidewordData' => refer_guideword::get(),
            'adminstrativeCtrPreData' => administrative_control_preventive::get(),
            'adminstrativeCtrMitData' => administrative_control_mitigative::get(),
            'engineeringCtrData' => engineering_control::get(),
        ];
        return view('livewire.forms01.formdata01')->with($data);
    }

    public function OpenAddCountryModal()
    {
        $this->currentData = Carbon::now()->format('Y-m-d') . " " . Carbon::now()->format('H:i:s');
        // $this->iproject_id_fk = session('globleSelectedProjectID');
        $this->D_routine = 'R';
        $this->M_any_legal_obligation_to_the_risk_assessment = 'NO';
        // $this->ibc_id_fk='';
        // $this->idepartment_id_fk='';
        $this->O_risk_acceptable_non_acceptable = 'unset';
        $this->V_risk_acceptable_non_acceptable = 'unset';
        $this->U_risk_quantum = 0;
        $this->N_risk_quantum = 0;
        $this->iproject_id_fk = '0';
        $this->sproject_location = '';
        $this->B_activity_id_fk = '0';
        $this->C_sub_activity_id_fk = '0';
        $this->E_potential_hazard_id_fk = '0';
        $this->F_probable_consequence_id_fk = '0';
        $this->G_causes_id_fk = '0';
        // $this->G1_sub_causes_id_fk = '0';
        $this->G1_sub_causes_id_fks = [];
        $this->H_preventive_incident_control_id_fk = '0';
        $this->I_consequences_controls_id_fk = '0';
        $this->J_risk_probability_id_fk = '0';
        $this->K_risk_consequence_id_fk = '0';
        $this->L_duration_of_exposure_id_fk = '0';
        $this->engineering_control_id_fk = '0';
        $this->P_no_of_person_believed_to_be_affected = 0;
        $this->Q_actions_as_per_hierarchy_of_control = [];
        $this->administrative_control_preventive_id_fk = '0';
        $this->administrative_control_mitigative_id_fk = '0';
        $this->R_risk_probability = '0';
        $this->S_risk_consequence = '0';
        $this->T_duration = '0';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    // insert
    public function save()
    {
        $this->validate([

            //  'ibc_id_fk'=>'require',
            //  'idepartment_id_fk'=>'require',
            'iproject_id_fk' => 'required|not_in:0',
            //  'document_id_fk'=>'required',
            'B_activity_id_fk' => 'required|not_in:0',
            'C_sub_activity_id_fk' => 'required|not_in:0',
            'D_routine' => 'required',
            'E_potential_hazard_id_fk' => 'required|not_in:0',
            'F_probable_consequence_id_fk' => 'required|not_in:0',
            'G_causes_id_fk' => 'required|not_in:0',
            'G1_sub_causes_id_fks' => 'required|not_in:0',
            'H_preventive_incident_control_id_fk' => 'required|not_in:0',
            'I_consequences_controls_id_fk' => 'required|not_in:0',
            'J_risk_probability_id_fk' => 'required|not_in:0',
            'K_risk_consequence_id_fk' => 'required|not_in:0',
            'L_duration_of_exposure_id_fk' => 'required|not_in:0',
            'engineering_control_id_fk' => 'required|not_in:0',
            'administrative_control_preventive_id_fk' => 'required|not_in:0',
            'administrative_control_mitigative_id_fk' => 'required|not_in:0',
            'M_any_legal_obligation_to_the_risk_assessment' => 'required',
            'N_risk_quantum' => 'required',
            'O_risk_acceptable_non_acceptable' => 'required',
            // 'P_no_of_person_believed_to_be_affected' => 'required',
            // 'Q_actions_as_per_hierarchy_of_control' => 'required',
            // 'R_risk_probability' => 'required',
            // 'S_risk_consequence' => 'required',
            // 'T_duration' => 'required',
            // 'U_risk_quantum' => 'required',
            // 'V_risk_acceptable_non_acceptable' => 'required',
        ]);

        $save = Formdata_01::insert([
            // ibc_id_fk
            // idepartment_id_fk
            'iproject_id_fk' => $this->iproject_id_fk,
            // 'document_id_fk'=>$this->document_id_fk,
            'B_activity_id_fk' => $this->B_activity_id_fk,
            'C_sub_activity_id_fk' => $this->C_sub_activity_id_fk,
            'D_routine' => $this->D_routine,
            'E_potential_hazard_id_fk' => $this->E_potential_hazard_id_fk,
            'F_probable_consequence_id_fk' => $this->F_probable_consequence_id_fk,
            'G_causes_id_fk' => $this->G_causes_id_fk,
            // 'G1_sub_causes_id_fk'=>$this->G1_sub_causes_id_fk,
            'G1_sub_causes_id_fks' => implode(',', $this->G1_sub_causes_id_fks),
            'H_preventive_incident_control_id_fk' => $this->H_preventive_incident_control_id_fk,
            'I_consequences_controls_id_fk' => $this->I_consequences_controls_id_fk,
            'J_risk_probability_id_fk' => $this->J_risk_probability_id_fk,
            'K_risk_consequence_id_fk' => $this->K_risk_consequence_id_fk,
            'L_duration_of_exposure_id_fk' => $this->L_duration_of_exposure_id_fk,
            'engineering_control_id_fk' => $this->engineering_control_id_fk,
            'administrative_control_preventive_id_fk' => $this->administrative_control_preventive_id_fk,
            'administrative_control_mitigative_id_fk' => $this->administrative_control_mitigative_id_fk,
            'M_any_legal_obligation_to_the_risk_assessment' => $this->M_any_legal_obligation_to_the_risk_assessment,
            'N_risk_quantum' => $this->N_risk_quantum,
            'O_risk_acceptable_non_acceptable' => $this->O_risk_acceptable_non_acceptable,
            'P_no_of_person_believed_to_be_affected' => $this->P_no_of_person_believed_to_be_affected,
            'Q_actions_as_per_hierarchy_of_control' => implode(',', $this->Q_actions_as_per_hierarchy_of_control),
            'R_risk_probability' => $this->R_risk_probability,
            'S_risk_consequence' => $this->S_risk_consequence,
            'T_duration' => $this->T_duration,
            'U_risk_quantum' => $this->U_risk_quantum,
            'V_risk_acceptable_non_acceptable' => $this->V_risk_acceptable_non_acceptable,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    public function OpenEditCountryModal($formdata_01s_id)
    {
        $info = Formdata_01::find($formdata_01s_id);

        // dd($info);
        $this->currentData = Carbon::parse($info->created_at)->format('Y-m-d H:i:s');
        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->B_activity_id_fk = $info->B_activity_id_fk;
        $this->C_sub_activity_id_fk = $info->C_sub_activity_id_fk;
        $this->D_routine = $info->D_routine;
        $this->E_potential_hazard_id_fk = $info->E_potential_hazard_id_fk;
        $this->F_probable_consequence_id_fk = $info->F_probable_consequence_id_fk;
        $this->G_causes_id_fk = $info->G_causes_id_fk;
        $this->G1_sub_causes_id_fks = explode(',', $info->G1_sub_causes_id_fks);
        $this->H_preventive_incident_control_id_fk = $info->H_preventive_incident_control_id_fk;
        $this->I_consequences_controls_id_fk = $info->I_consequences_controls_id_fk;
        $this->J_risk_probability_id_fk = $info->J_risk_probability_id_fk;
        $this->K_risk_consequence_id_fk = $info->K_risk_consequence_id_fk;
        $this->L_duration_of_exposure_id_fk = $info->L_duration_of_exposure_id_fk;
        $this->engineering_control_id_fk = $info->engineering_control_id_fk;
        $this->administrative_control_preventive_id_fk = $info->administrative_control_preventive_id_fk;
        $this->administrative_control_mitigative_id_fk = $info->administrative_control_mitigative_id_fk;
        $this->M_any_legal_obligation_to_the_risk_assessment = $info->M_any_legal_obligation_to_the_risk_assessment;
        $this->N_risk_quantum = $info->N_risk_quantum;
        $this->O_risk_acceptable_non_acceptable = $info->O_risk_acceptable_non_acceptable;
        $this->P_no_of_person_believed_to_be_affected = $info->P_no_of_person_believed_to_be_affected;
        $this->Q_actions_as_per_hierarchy_of_control = explode(',', $info->Q_actions_as_per_hierarchy_of_control);
        $this->R_risk_probability = $info->R_risk_probability;
        $this->S_risk_consequence = $info->S_risk_consequence;
        $this->T_duration = $info->T_duration;
        $this->U_risk_quantum = $info->U_risk_quantum;
        $this->V_risk_acceptable_non_acceptable = $info->V_risk_acceptable_non_acceptable;


        $this->cid = $info->formdata_01s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_01s_id' => $formdata_01s_id
        ]);
    }

    //  update
    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            //  'ibc_id_fk'=>'require',
            //  'idepartment_id_fk'=>'require',
            'iproject_id_fk' => 'required|not_in:0',
            //  'document_id_fk'=>'required',
            'B_activity_id_fk' => 'required|not_in:0',
            'C_sub_activity_id_fk' => 'required|not_in:0',
            'D_routine' => 'required',
            'E_potential_hazard_id_fk' => 'required|not_in:0',
            'F_probable_consequence_id_fk' => 'required|not_in:0',
            'G_causes_id_fk' => 'required|not_in:0',
            'G1_sub_causes_id_fks' => 'required|not_in:0',
            'H_preventive_incident_control_id_fk' => 'required|not_in:0',
            'I_consequences_controls_id_fk' => 'required|not_in:0',
            'J_risk_probability_id_fk' => 'required|not_in:0',
            'K_risk_consequence_id_fk' => 'required|not_in:0',
            'L_duration_of_exposure_id_fk' => 'required|not_in:0',
            'engineering_control_id_fk' => 'required|not_in:0',
            'administrative_control_preventive_id_fk' => 'required|not_in:0',
            'administrative_control_mitigative_id_fk' => 'required|not_in:0',
            'M_any_legal_obligation_to_the_risk_assessment' => 'required',
            'N_risk_quantum' => 'required',
            'O_risk_acceptable_non_acceptable' => 'required',
            // 'P_no_of_person_believed_to_be_affected' => 'required',
            // 'Q_actions_as_per_hierarchy_of_control' => 'required',
            // 'R_risk_probability' => 'required',
            // 'S_risk_consequence' => 'required',
            // 'T_duration' => 'required',
            // 'U_risk_quantum' => 'required',
            // 'V_risk_acceptable_non_acceptable' => 'required',
        ]);

        $update = Formdata_01::find($cid)->update([
            'iproject_id_fk' => $this->iproject_id_fk,
            // 'document_id_fk'=>$this->document_id_fk,
            'B_activity_id_fk' => $this->B_activity_id_fk,
            'C_sub_activity_id_fk' => $this->C_sub_activity_id_fk,
            'D_routine' => $this->D_routine,
            'E_potential_hazard_id_fk' => $this->E_potential_hazard_id_fk,
            'F_probable_consequence_id_fk' => $this->F_probable_consequence_id_fk,
            'G_causes_id_fk' => $this->G_causes_id_fk,
            // 'G1_sub_causes_id_fk'=>$this->G1_sub_causes_id_fk,
            'G1_sub_causes_id_fks' => implode(',', $this->G1_sub_causes_id_fks),
            'H_preventive_incident_control_id_fk' => $this->H_preventive_incident_control_id_fk,
            'I_consequences_controls_id_fk' => $this->I_consequences_controls_id_fk,
            'J_risk_probability_id_fk' => $this->J_risk_probability_id_fk,
            'K_risk_consequence_id_fk' => $this->K_risk_consequence_id_fk,
            'L_duration_of_exposure_id_fk' => $this->L_duration_of_exposure_id_fk,
            'engineering_control_id_fk' => $this->engineering_control_id_fk,
            'administrative_control_preventive_id_fk' => $this->administrative_control_preventive_id_fk,
            'administrative_control_mitigative_id_fk' => $this->administrative_control_mitigative_id_fk,
            'M_any_legal_obligation_to_the_risk_assessment' => $this->M_any_legal_obligation_to_the_risk_assessment,
            'N_risk_quantum' => $this->N_risk_quantum,
            'O_risk_acceptable_non_acceptable' => $this->O_risk_acceptable_non_acceptable,
            'P_no_of_person_believed_to_be_affected' => $this->P_no_of_person_believed_to_be_affected,
            'Q_actions_as_per_hierarchy_of_control' => implode(',', $this->Q_actions_as_per_hierarchy_of_control),
            'R_risk_probability' => $this->R_risk_probability,
            'S_risk_consequence' => $this->S_risk_consequence,
            'T_duration' => $this->T_duration,
            'U_risk_quantum' => $this->U_risk_quantum,
            'V_risk_acceptable_non_acceptable' => $this->V_risk_acceptable_non_acceptable,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function clearValuesandValidation()
    {
        # code...
        $this->resetValidation();
        // $this->imgsId = '';
    }
}
