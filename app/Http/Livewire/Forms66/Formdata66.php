<?php

namespace App\Http\Livewire\Forms66;

use App\Models\common_forms\Projects;
use App\Models\forms_00\formdata_00;
use App\Models\forms_66\Activity66;
use App\Models\forms_66\DurationOfImpact;
use App\Models\forms_66\EnvironmentalImpact;
use App\Models\forms_66\formdata66 as Forms66data;
use App\Models\forms_66\OrganizationRequirements;
use App\Models\forms_66\Probability;
use App\Models\forms_66\ScaleOfImpact;
use App\Models\forms_66\SevertyOfImpact;
use App\Models\forms_66\SubActivity66;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Formdata66 extends Component
{
    use WithPagination;
    protected $listeners = ['selectedProjectID', 'delete'];
    // normal field 
    public $G_existing_controls_as_per_hierarchy, $L_consequence, $N_impact_score, $O_significance_score_level, $P_additional_control, $Q_risk_rating_priority, $D_environmental_aspect, $F_condition_of_impact;
    // all fk
    public $ibc_id_fk, $idepartment_id_fk, $iproject_id_fk, $ddd_id_fk, $B_activity_id_fk, $C_sub_activity_id_fk, $E_environmental_impact_id_fk, $H_organization_requirement_id_fk, $I_scale_of_impact_id_fk, $J_severty_of_impact_id_fk, $K_duration_of_impact_id_fk, $M_probability_id_fk;

    // collect property
    public $C_sub_activity_id_fks = [];

    public $searchQuery, $sproject_location, $currentDate, $ifnotSignificance;
    public $selectedProjectID, $userID,$old_iproject_id_fk; // this id is globle available

    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }

    public function mount()
    {
        # code...
        $this->ddd_id_fk = 66;
        $this->iproject_id_fk = session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*' ? session('globleSelectedProjectID') : 0;

        $this->userID = Auth::user()->id;
    }

    public function render()
    {
        $formdata66 = Forms66data::select('formdata66s.created_at as form66create', 'formdata66s.*', 'projects.sproject_name', 'activity66s.activity_description', 'sub_activity66s.sub_activity_description', 'environmental_impacts.environmental_impact_description', 'organization_requirements.organization_requirement_description')
        // select('formdata66s.created_at as form66create', 'formdata66s.formdata66_id', 'formdata66s.F_condition_of_impact', 'formdata66s.G_existing_controls_as_per_hierarchy', 'formdata66s.H_organization_requirement_id_fk', 'formdata66s.O_significance_score_level', 'projects.sproject_name', 'activity66s.activity_description', 'sub_activity66s.sub_activity_description', 'environmental_impacts.environmental_impact_description', 'organization_requirements.organization_requirement_description')
            // ->join('companies', 'companies.ibc_id', '=', 'formdata66s.ibc_id_fk')
            // idepartment_id_fk
            // ->join('departments', 'departments.idepartment_id', '=', 'formdata66s.idepartment_id_fk')
            // iproject_id_fk
            ->join('projects', 'projects.iproject_id', '=', 'formdata66s.iproject_id_fk')
            // ddd_id_fk
            // ->join('dept_default_docs', 'dept_default_docs.ddd_id', '=', 'formdata66s.ddd_id_fk')
            // B_activity_id_fk
            ->join('activity66s', 'activity66s.activity_id', '=', 'formdata66s.B_activity_id_fk')
            // C_sub_activity_id_fk
            ->join('sub_activity66s', 'sub_activity66s.sub_activity_id', '=', 'formdata66s.C_sub_activity_id_fk')
            ->join('organization_requirements', 'organization_requirements.organization_requirement_id', '=', 'H_organization_requirement_id_fk')
            ->join('environmental_impacts', 'environmental_impacts.environmental_impact_id', '=', 'E_environmental_impact_id_fk')
            ->when(session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*', function ($data) {
                # code...
                $data->where('iproject_id_fk', '=', session('globleSelectedProjectID'))
                    ->where(['formdata66s.bactive' => '1', 'formdata66s.user_created' => $this->userID]);
            })
            ->where(['formdata66s.bactive' => '1', 'formdata66s.user_created' => $this->userID])
            ->orderBy('formdata66_id', 'asc')->paginate(10);
        // dd($formdata66);
        $data = [
            'formdata66' => $formdata66,
            'prjectData' => Projects::where(['projects.bactive' => '1', 'projects.user_created' => $this->userID])->get(),
            'activityData' => Activity66::get(),
            'subactivityData' => SubActivity66::where('activity_id_fk', '=', $this->B_activity_id_fk)->get(),
            'environmetalimpactData' => EnvironmentalImpact::get(),
            'organizationrequirementData' => OrganizationRequirements::get(),
            'scaleimpacttData' => ScaleOfImpact::get(),
            'severtyimpactData' => SevertyOfImpact::get(),
            'durationoimpactData' => DurationOfImpact::get(),
            'probabilityData' => Probability::get(),
        ];
        return view('livewire.forms66.formdata66')->with($data);
    }



    public function OpenAddCountryModal()
    {
        // $this->ibc_id_fk = '';
        // $this->idepartment_id_fk = '';
        // $this->ddd_id_fk = '';
        $this->currentDate = Carbon::now()->format(env('DATE_FORMAT1'));
        // $this->iproject_id_fk = '0';
        $this->B_activity_id_fk = '0';
        $this->C_sub_activity_id_fk = '0';
        // $this->C_sub_activity_id_fks = '';
        $this->E_environmental_impact_id_fk = '0';
        $this->H_organization_requirement_id_fk = '0';
        $this->I_scale_of_impact_id_fk = '0';
        $this->J_severty_of_impact_id_fk = '0';
        $this->K_duration_of_impact_id_fk = '0';
        $this->M_probability_id_fk = '0';
        $this->D_environmental_aspect = '';
        $this->F_condition_of_impact = 'A';
        $this->G_existing_controls_as_per_hierarchy = '';
        $this->L_consequence = '';
        $this->N_impact_score = '';
        $this->O_significance_score_level = 'Nonsignificant';
        // $this->P1_cut_off_value = '';
        $this->P_additional_control = '';
        // $this->Q_risk_rating_priority = '';


        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            // 'ibc_id_fk'=>'required|not_in:0',
            // 'idepartment_id_fk'=>'required|not_in:0',
            // 'ddd_id_fk'=>'required|not_in:0',
            'iproject_id_fk' => 'required|not_in:0',
            'B_activity_id_fk' => 'required|not_in:0',
            'C_sub_activity_id_fk' => 'required|not_in:0',
            // 'C_sub_activity_id_fks'=>'required',
            'E_environmental_impact_id_fk' => 'required|not_in:0',
            'H_organization_requirement_id_fk' => 'required|not_in:0',
            'I_scale_of_impact_id_fk' => 'required|not_in:0',
            'J_severty_of_impact_id_fk' => 'required|not_in:0',
            'K_duration_of_impact_id_fk' => 'required|not_in:0',
            'M_probability_id_fk' => 'required|not_in:0',
            'D_environmental_aspect' => 'required',
            'F_condition_of_impact' => 'required',
            'G_existing_controls_as_per_hierarchy' => 'required',
            'L_consequence' => 'required',
            'N_impact_score' => 'required',
            'O_significance_score_level' => 'required',
            // 'P1_cut_off_value'=>'required',
            'P_additional_control' => 'required',
            // 'Q_risk_rating_priority'=>'required',
        ]);

        $save = Forms66data::insert([
            'ibc_id_fk' => $this->ibc_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'ddd_id_fk' => $this->ddd_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'B_activity_id_fk' => $this->B_activity_id_fk,
            'C_sub_activity_id_fk' => $this->C_sub_activity_id_fk,
            // 'C_sub_activity_id_fks'=>$this->C_sub_activity_id_fks,
            'E_environmental_impact_id_fk' => $this->E_environmental_impact_id_fk,
            'H_organization_requirement_id_fk' => $this->H_organization_requirement_id_fk,
            'I_scale_of_impact_id_fk' => $this->I_scale_of_impact_id_fk,
            'J_severty_of_impact_id_fk' => $this->J_severty_of_impact_id_fk,
            'K_duration_of_impact_id_fk' => $this->K_duration_of_impact_id_fk,
            'M_probability_id_fk' => $this->M_probability_id_fk,
            'D_environmental_aspect' => $this->D_environmental_aspect,
            'F_condition_of_impact' => $this->F_condition_of_impact,
            'G_existing_controls_as_per_hierarchy' => $this->G_existing_controls_as_per_hierarchy,
            'L_consequence' => $this->L_consequence,
            'N_impact_score' => $this->N_impact_score,
            'O_significance_score_level' => $this->O_significance_score_level,
            // 'P1_cut_off_value'=>$this->P1_cut_off_value,
            'P_additional_control' => $this->P_additional_control,
            // 'Q_risk_rating_priority'=>$this->Q_risk_rating_priority,

            'user_created' => $this->userID,
        ]);

        if ($save) {
            $increament = formdata_00::where([
                'user_created' => $this->userID,
                'iproject_id_fk' => $this->iproject_id_fk,
                'idepartment_id_fk' => $this->idepartment_id_fk,
                'ibc_id_fk' => $this->ibc_id_fk,
                'ddd_id_fk' => $this->ddd_id_fk
            ])->increment('counter', 1);
            if ($increament) {
                # code...
                $this->dispatchBrowserEvent('CloseAddCountryModal');
            }
        }
    }


    // update 
    public function OpenEditCountryModal($formdata66_id)
    {
        $info = Forms66data::find($formdata66_id);

        $this->ibc_id_fk = $info->ibc_id_fk;
        $this->idepartment_id_fk = $info->idepartment_id_fk;
        // $this->ddd_id_fk=$info->ddd_id_fk;
        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->old_iproject_id_fk = $info->iproject_id_fk; // for comparing
        $this->B_activity_id_fk = $info->B_activity_id_fk;
        $this->C_sub_activity_id_fk = $info->C_sub_activity_id_fk;
        $this->C_sub_activity_id_fks = $info->C_sub_activity_id_fks;
        $this->E_environmental_impact_id_fk = $info->E_environmental_impact_id_fk;
        $this->H_organization_requirement_id_fk = $info->H_organization_requirement_id_fk;
        $this->I_scale_of_impact_id_fk = $info->I_scale_of_impact_id_fk;
        $this->J_severty_of_impact_id_fk = $info->J_severty_of_impact_id_fk;
        $this->K_duration_of_impact_id_fk = $info->K_duration_of_impact_id_fk;
        $this->M_probability_id_fk = $info->M_probability_id_fk;
        $this->D_environmental_aspect = $info->D_environmental_aspect;
        $this->F_condition_of_impact = $info->F_condition_of_impact;
        $this->G_existing_controls_as_per_hierarchy = $info->G_existing_controls_as_per_hierarchy;
        $this->L_consequence = $info->L_consequence;
        $this->N_impact_score = $info->N_impact_score;
        $this->O_significance_score_level = $info->O_significance_score_level;
        // $this->P1_cut_off_value=$info->P1_cut_off_value;
        $this->P_additional_control = $info->P_additional_control;
        // $this->Q_risk_rating_priority=$info->Q_risk_rating_priority;


        $this->cid = $info->formdata66_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata66_id' => $formdata66_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            // 'ibc_id_fk'=>'required|not_in:0',
            // 'idepartment_id_fk'=>'required|not_in:0',
            // 'ddd_id_fk'=>'required|not_in:0',
            'iproject_id_fk' => 'required|not_in:0',
            'B_activity_id_fk' => 'required|not_in:0',
            'C_sub_activity_id_fk' => 'required|not_in:0',
            // 'C_sub_activity_id_fks'=>'required',
            'E_environmental_impact_id_fk' => 'required|not_in:0',
            'H_organization_requirement_id_fk' => 'required|not_in:0',
            'I_scale_of_impact_id_fk' => 'required|not_in:0',
            'J_severty_of_impact_id_fk' => 'required|not_in:0',
            'K_duration_of_impact_id_fk' => 'required|not_in:0',
            'M_probability_id_fk' => 'required|not_in:0',
            'D_environmental_aspect' => 'required',
            'F_condition_of_impact' => 'required',
            'G_existing_controls_as_per_hierarchy' => 'required',
            'L_consequence' => 'required',
            'N_impact_score' => 'required',
            'O_significance_score_level' => 'required',
            // 'P1_cut_off_value'=>'required',
            'P_additional_control' => 'required',
            // 'Q_risk_rating_priority'=>'required',
        ]);

        $update = Forms66data::find($cid)->update([
            'ibc_id_fk' => $this->ibc_id_fk,
            // 'ddd_id_fk'=>$this->ddd_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'B_activity_id_fk' => $this->B_activity_id_fk,
            'C_sub_activity_id_fk' => $this->C_sub_activity_id_fk,
            // 'C_sub_activity_id_fks'=>$this->C_sub_activity_id_fks,
            'E_environmental_impact_id_fk' => $this->E_environmental_impact_id_fk,
            'H_organization_requirement_id_fk' => $this->H_organization_requirement_id_fk,
            'I_scale_of_impact_id_fk' => $this->I_scale_of_impact_id_fk,
            'J_severty_of_impact_id_fk' => $this->J_severty_of_impact_id_fk,
            'K_duration_of_impact_id_fk' => $this->K_duration_of_impact_id_fk,
            'M_probability_id_fk' => $this->M_probability_id_fk,
            'D_environmental_aspect' => $this->D_environmental_aspect,
            'F_condition_of_impact' => $this->F_condition_of_impact,
            'G_existing_controls_as_per_hierarchy' => $this->G_existing_controls_as_per_hierarchy,
            'L_consequence' => $this->L_consequence,
            'N_impact_score' => $this->N_impact_score,
            'O_significance_score_level' => $this->O_significance_score_level,
            // 'P1_cut_off_value'=>$this->P1_cut_off_value,
            'P_additional_control' => $this->P_additional_control,
            // 'Q_risk_rating_priority'=>$this->Q_risk_rating_priority,

            'user_updated' => $this->userID,
        ]);

        if ($update) {
            if ($this->old_iproject_id_fk != $this->iproject_id_fk) {
                # code...
                formdata_00::where([
                    'user_created' => $this->userID,
                    'iproject_id_fk' => $this->old_iproject_id_fk,
                    'ddd_id_fk' => $this->ddd_id_fk
                ])->decrement('counter', 1);

                formdata_00::where([
                    'user_created' => $this->userID,
                    'iproject_id_fk' => $this->iproject_id_fk,
                    'idepartment_id_fk' => $this->idepartment_id_fk,
                    'ibc_id_fk' => $this->ibc_id_fk,
                    'ddd_id_fk' => $this->ddd_id_fk
                ])->increment('counter', 1);
            }
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($formdata66_id)
    {
        $info = Forms66data::find($formdata66_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->organization_requirement_description . '</strong>',
            'id' => $formdata66_id
        ]);
    }



    public function delete($formdata66_id)
    {
        $del =  Forms66data::find($formdata66_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    public function clearValuesandValidation()
    {
        # code...
        $this->resetValidation();
        // $this->imgsId = '';
    }
}
