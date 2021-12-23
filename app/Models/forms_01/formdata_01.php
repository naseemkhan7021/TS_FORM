<?php

namespace App\Models\forms_01;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_01 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_01s_id';
    protected $table = 'formdata_01s';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk',
        'document_id_fk',
        'B_activity_id_fk',
        'C_sub_activity_id_fk',
        'D_routine',
        'E_potential_hazard_id_fk',
        'F_probable_consequence_id_fk',
        'G_causes_id_fk',
        'G1_sub_causes_id_fk',
        'H_preventive_incident_control_id_fk',
        'I_consequences_controls_id_fk',
        'J_risk_probability_id_fk',
        'K_risk_consequence_id_fk',
        'L_duration_of_exposure_id_fk',
        'engineering_control_id_fk',
        'administrative_control_preventive_id_fk',
        'administrative_control_mitigative_id_fk',
        'M_any_legal_obligation_to_the_risk_assessment',
        'N_risk_quantum',
        'O_risk_acceptable_non_acceptable',
        'P_no_of_person_believed_to_be_affected',
        'Q_actions_as_per_hierarchy_of_control',
        'R_risk_probability',
        'S_risk_consequence',
        'T_duration',
        'U_risk_quantum', 'V_risk_acceptable_non_acceptable',
    ];
}
