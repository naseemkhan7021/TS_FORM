<?php

namespace App\Models\forms_17;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_17 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_17s_id'; 
    protected $table = 'formdata_17s';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk',
        'document_id_fk',
        'formdata_16s_id_fk',
        'substandaction_id_fk',
        'substandcondition_id_fk',
        'substandaction_ids',
        'substandcondition_ids',
        'incident_description',
        'coworker_statement',
        'concernedsupervisor_statement',
        'root_cause',
        'remedial_actions',
        'comment_remedial_actions',
        'site_safety_in_charge_name',
        'site_safety_in_charge_signature',
        'project_manager',
        'project_manager_signature',
    ];


    // protected $casts = [
    //     'substandcondition_ids' => 'array',
    //     'substandaction_ids' => 'array',
    // ];
}
