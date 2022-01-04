<?php

namespace App\Models\forms_66;

use App\Models\forms_66\Activity66;
use App\Models\forms_66\SubActivity66;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formdata66 extends Model
{
    use HasFactory;
    protected $primaryKey = 'formdata66_id';
    protected $fillable = [
        'ibc_id_fk',
        'idepartment_id_fk',
        'iproject_id_fk',
        'ddd_id_fk',
        // *
        'B_activity_id_fk',
        'C_sub_activity_id_fk',
        'C_sub_activity_id_fks',
        'E_environmental_impact_id_fk',
        'H_organization_requirement_id_fk',
        'I_scale_of_impact_id_fk',
        'J_severty_of_impact_id_fk',
        'K_duration_of_impact_id_fk',
        'M_probability_id_fk',
        'D_environmental_aspect',
        'F_condition_of_impact',
        'G_existing_controls_as_per_hierarchy',
        'L_consequence',
        'N_impact_score',
        'O_significance_score_level',
        'P1_cut_off_value',
        'P_additional_control',
        'Q_risk_rating_priority',
    ];


    public function sub_activity()
    {
        return $this->hasManyThrough(SubActivity66::class,Activity66::class,);
    }
}
