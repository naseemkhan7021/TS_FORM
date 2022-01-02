<?php

namespace App\Models\forms_28;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_28 extends Model
{
    use HasFactory;
    protected $primaryKey = 'formdata_28s_id';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk',
        'document_id_fk',
        'observation_desc',
        'observer_name',
        'noticed_time',
        'recommend_corrective_action',
        'location',
        'responsible_person',
        'sign_resp_person',
        'closed_dt',
        'remarks',
        'prioritytimescales_id_fk'
    ];
}
