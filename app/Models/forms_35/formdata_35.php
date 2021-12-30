<?php

namespace App\Models\forms_35;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_35 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_22s_id';
    protected $table = 'formdata_22_headers';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk',  # **
        'document_id_fk',
        'ehsind_dt',
        'contractor_name', # **
        'venue', # **
        'faculty_name', # **
        'duration',
        'faculty_sign',
        'site_safety_in_charge_name',
        'site_safety_in_charge_sign',
        'topic_discusseds_ids'
    ];

}
