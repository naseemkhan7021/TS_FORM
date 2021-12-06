<?php

namespace App\Models\forms_16;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_16 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_16s_id';
    protected $table = 'formdata_16s';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk',
        'document_id_fk',
        'potential_injurytos_fk',
        'injuredvictim_name',
        'eml_id_no',
        'designation',
        'dob_dt',
        'age',
        'doj_dt',
        'safety_inducted',
        'married',
        'present_address1',
        'present_address2',
        'person_on_duty',
        'person_authorized_2_incident_area',
        'first_incident_reported_to',
        'by_whom',
        'date_time_reported_dt',
        'witness1_name',
        'designation_1',
        'witness2_name',
        'designation_2',
        'first_aid_given_on_site',
        'name_first_aider',
        'victim_taken_hospital',
        'name_hospital',
        'victim_hospital_dischaged',
        'return_to_work',
        'victim_influence_alcohol',
        'description_of_incident',
        'uploaddocuments_fk',
        'extend_injury',
        'activity16',
        'relavebt_risk_referenceno',
        'control_measure',
        'actions_taken',
        'site_enginner_name',
        'signature',
        'project_manager',
        'signature',
    ];
}
