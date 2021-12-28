<?php

namespace App\Http\Livewire\Forms66;

use Livewire\Component;
use Livewire\WithPagination;

class Formdata66 extends Component
{
    use WithPagination;
    protected $listeners = ['selectedProjectID'];
    // normal field 
    public $G_existing_controls_as_per_hierarchy, $L_consequence, $N_impact_score, $O_significance_score_level, $P_additional_control, $Q_risk_rating_priority, $D_environmental_aspect, $F_condition_of_impact;
    // all fk
    public $ibc_id_fk,$idepartment_id_fk,$iproject_id_fk,$document_id_fk,$B_activity_id_fk,$C_sub_activity_id_fk,$E_environmental_impact_id_fk,$H_organization_requirement_id_fk,$I_scale_of_impact_id_fk,$J_severty_of_impact_id_fk,$K_duration_of_impact_id_fk,$M_probability_id_fk;
    
    // collect property
    public $G1_sub_causes_id_fks = [];

    public $searchQuery, $sproject_location, $currentData, $ifnotSignificance;
    public $selectedProjectID; // this id is globle available


    
    public function render()
    {
        return view('livewire.forms66.formdata66');
    }
}
