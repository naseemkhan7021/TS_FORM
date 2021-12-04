<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Formdata_01;
use Livewire\Component;

class Formdata01 extends Component
{
    public $searchQuery;

    public  $M_any_legal_obligation_to_the_risk_assessment,
            $N_risk_quantum,
            $O_risk_acceptable_non_acceptable,
            $P_no_of_person_believed_to_be_affected,
            $Q_actions_as_per_hierarchy_of_control,
            $R_risk_probability,
            $S_risk_consequence,
            $T_duration,
            $U_risk_quantum,
            $V_risk_acceptable_non_acceptable;

    public  $upd_M_any_legal_obligation_to_the_risk_assessment,
            $upd_N_risk_quantum,
            $upd_O_risk_acceptable_non_acceptable,
            $upd_P_no_of_person_believed_to_be_affected,
            $upd_Q_actions_as_per_hierarchy_of_control,
            $upd_R_risk_probability,
            $upd_S_risk_consequence,
            $upd_T_duration,
            $upd_U_risk_quantum,
            $upd_V_risk_acceptable_non_acceptable;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $formdata01 = Formdata_01::join('companies','companies.ibc_id','=','formdata_01s.ibc_id_fk')
        // idepartment_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.idepartment_id_fk')
        // iproject_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.iproject_id_fk')
        // document_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.document_id_fk')
        // B_activity_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.B_activity_id_fk')
        // C_sub_activity_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.C_sub_activity_id_fk')
        // D_routine
        ->join('companies','companies.ibc_id','=','formdata_01s.D_routine')
        // E_potential_hazard_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.E_potential_hazard_id_fk')
        // F_probable_consequence_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.F_probable_consequence_id_fk')
        // G_causes_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.G_causes_id_fk')
        // G1_sub_causes_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.G1_sub_causes_id_fk')
        // H_preventive_incident_control_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.H_preventive_incident_control_id_fk')
        // I_consequences_controls_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.I_consequences_controls_id_fk')
        // J_risk_probability_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.J_risk_probability_id_fk')
        // K_risk_consequence_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.K_risk_consequence_id_fk')
        // L_duration_of_exposure_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.L_duration_of_exposure_id_fk')
        // engineering_control_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.engineering_control_id_fk')
        // administrative_control_preventive_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.administrative_control_preventive_id_fk')
        // administrative_control_mitigative_id_fk
        ->join('companies','companies.ibc_id','=','formdata_01s.administrative_control_mitigative_id_fk')
        ->when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('M_any_legal_obligation_to_the_risk_assessment', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('N_risk_quantum', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('O_risk_acceptable_non_acceptable', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('P_no_of_person_believed_to_be_affected', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('Q_actions_as_per_hierarchy_of_control','like','%',$this->searchQuery.'%')
                ->orWhere('R_risk_probability','like','%',$this->searchQuery.'%')
                ->orWhere('S_risk_consequence','like','%',$this->searchQuery.'%')
                ->orWhere('T_duration','like','%',$this->searchQuery.'%')
                ->orWhere('U_risk_quantum','like','%',$this->searchQuery.'%')
                ->orWhere('V_risk_acceptable_non_acceptable','like','%',$this->searchQuery.'%')
                ;
        })->orderBy('formdata_01s_id', 'dec')->paginate(10);
        return view('livewire.forms01.formdata01',[
            'formdata01'=>$formdata01
        ]);
    }
}
