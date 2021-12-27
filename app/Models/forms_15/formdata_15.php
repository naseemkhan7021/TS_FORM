<?php

namespace App\Models\forms_15;

use App\Models\projcon\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata_15 extends Model
{
    use HasFactory;

    protected $primaryKey = 'formdata_15s_id';
    protected $table = 'formdata_15s';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk',
        'document_id_fk',
        'potential_injurytos_fk',
        'report_no',
        'potential_injurytos_other',
        'nature_of_potential_injuries_ids',
        'nature_of_potential_injuries_other',
        'activity15s_ids',
        'details_of_nearmiss',
        'imdcause15s_ids',
        'imdcause15s_other',
        'contributing_causes_ids',
        'contributing_causes_other',
        'whyunsafeact_committeds_ids',
        'whyunsafeact_committeds_other',
        'imd_actions_ids',
        'imd_corrections_ids',
        'further_recommended_action',
        'completed_by_name',
        'completed_by_signature',
        'completed_date',
        'doincident_dt',
    ];
    public function project()
    {
        # code...
        return $this->hasOne(Project::class, 'iproject_id','iproject_id_fk');
    }
}
