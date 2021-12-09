<?php

namespace App\Http\Livewire\Forms16;

use App\Models\common\Gender;
use App\Models\common_forms\PotentialInjuryto;
use App\Models\forms_16\formdata_16;
use App\Models\projcon\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Formdata16 extends Component
{
    public $searchQuery, $showOtherInput, $showhospital, $victimDischargeorNot ,$role;
    public $injuredvictim_name, $designation, $age, $sproject_location, $iproject_id_fk, $doincident_dt, $potential_injurytos_fk, $potential_injurytos_other, $eml_id_no, $dob_dt, $gender_fk, $doj_dt, $safety_inducted, $married, $person_on_duty, $person_authorized_2_incident_area, $present_address, $permanent_address, $by_whom, $first_incident_reported_to, $date_time_reported_dt, $witness1_name, $designation_1, $witness2_name, $designation_2, $first_aid_given_on_site, $name_first_aider, $victim_taken_hospital, $name_hospital, $victim_hospital_dischaged, $return_to_work, $victim_influence_alcohol, $description_of_incident, $uploaddocuments_fk, $extend_injury, $activity16, $relavebt_risk_referenceno, $control_measure, $actions_taken, $site_enginner_name, $site_enginner_signature, $project_manager, $project_manager_signature;
    public $cid, $upd_injuredvictim_name, $upd_designation, $upd_age;




    public function mount()
    {
        $this->searchQuery = '';
        $this->showhospital = 'No';
        $this->victimDischargeorNot = 'No';
    }

    public function render()
    {
        $form16data = formdata_16::join('companies', 'companies.ibc_id', '=', 'formdata_16s.ibc_id_fk')
            // ->join('defaultdatas','defaultdatas.idefault_id','=','formdata_16s.idefault_id_fk')
            // ->join('companies','companies.ibc_id','=','formdata_16s.ibc_id_fk')
            // ->join('departments','departments.idepartment_id','=','formdata_16s.idepartment_id_fk')
            // ->join('documents','documents.document_id','=','formdata_16s.document_id_fk')
            ->join('potential_injurytos', 'potential_injurytos.potential_injurytos_id', '=', 'formdata_16s.potential_injurytos_fk')
            // ->join('projects','projects.iproject_id','=','formdata_16s.iproject_id_fk')

            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('injuredvictim_name', 'like', '%' . $this->searchQuery . '%')
                    ->where('age', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('designation', 'like', '%' . $this->searchQuery . '%');
            })
            ->orderBy('formdata_16s_id')->paginate(10);

        $prjectData = Project::all();
        $genderData = Gender::all();
        $potentialinjurytotData = PotentialInjuryto::all();

        return view('livewire.forms16.formdata16', [
            'form16data' => $form16data, 'prjectData' => $prjectData, 'genderData' => $genderData, 'potentialinjurytotData' => $potentialinjurytotData
        ]);
    }


    public function OpenAddCountryModal()
    {
        $this->injuredvictim_name = '';
        $this->designation = '';
        $this->age = '';
        $this->sproject_location = '';
        $this->iproject_id_fk = '';
        $this->doincident_dt = Carbon::now()->format('Y-m-d')." ".Carbon::now()->format('H:i:s'); //Carbon::now();
        $this->potential_injurytos_fk = '';
        $this->potential_injurytos_other = '';
        $this->eml_id_no = '';
        $this->dob_dt = '';
        $this->gender_fk = '';
        $this->doj_dt = '';
        $this->safety_inducted = '';
        $this->married = '';
        $this->person_on_duty = '';
        $this->person_authorized_2_incident_area = '';
        $this->present_address = '';
        $this->permanent_address = '';
        $this->by_whom = '';
        $this->first_incident_reported_to = '';
        $this->date_time_reported_dt = '';
        $this->witness1_name = '';
        $this->designation_1 = '';
        $this->witness2_name = '';
        $this->designation_2 = '';
        $this->first_aid_given_on_site = '';
        $this->name_first_aider = '';
        $this->victim_taken_hospital = '';
        $this->name_hospital = '';
        $this->victim_hospital_dischaged = '';
        $this->return_to_work = '1997-06-01';
        $this->victim_influence_alcohol = '';
        $this->description_of_incident = '';
        $this->uploaddocuments_fk = '';
        $this->extend_injury = '';
        $this->activity16 = '';
        $this->relavebt_risk_referenceno = '';
        $this->control_measure = '';
        $this->actions_taken = '';
        $this->site_enginner_name = Auth::user()->name;
        $this->site_enginner_signature = Auth::user()->name;
        $this->project_manager = '';
        $this->project_manager_signature = '';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'injuredvictim_name' => 'required',
            'age' => 'required',
            'designation' => 'required',
            'sproject_location' => 'required',
            'iproject_id_fk' => 'required|not_in:0',
            'doincident_dt' => 'required',
            'potential_injurytos_fk' => 'required',
            'eml_id_no' => 'required',
            'dob_dt' => 'required',
            'gender_fk' => 'required|not_in:0',
            'doj_dt' => 'required',
            'safety_inducted' => 'required',
            'married' => 'required',
            'person_on_duty' => 'required',
            'person_authorized_2_incident_area' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'by_whom' => 'required',
            'first_incident_reported_to' => 'required',
            'date_time_reported_dt' => 'required',
            'witness1_name' => 'required',
            'designation_1' => 'required',
            'witness2_name' => 'required',
            'designation_2' => 'required',
            'first_aid_given_on_site' => 'required',
            'name_first_aider' => 'required',
            // 'victim_taken_hospital' => 'required',
            // 'name_hospital' => 'required',
            'victim_hospital_dischaged' => 'required',
            // 'return_to_work' => 'required',
            'victim_influence_alcohol' => 'required',
            'description_of_incident' => 'required',
            // 'uploaddocuments_fk' => 'required',
            'extend_injury' => 'required',
            'activity16' => 'required',
            'relavebt_risk_referenceno' => 'required',
            'control_measure' => 'required',
            'actions_taken' => 'required',
            'site_enginner_name' => 'required',
            'site_enginner_signature' => 'required',
            'project_manager' => 'required',
            'project_manager_signature' => 'required',
        ]);

        $save = formdata_16::insert([
            'injuredvictim_name' => $this->injuredvictim_name,
            'designation' => $this->designation,
            'age' => $this->age,
            // 'sproject_location'=> $this->sproject_location,
            'iproject_id_fk' => $this->iproject_id_fk,
            'doincident_dt' => $this->doincident_dt,
            'potential_injurytos_fk' => $this->potential_injurytos_fk,
            'potential_injurytos_other' => $this->potential_injurytos_other,
            'eml_id_no' => $this->eml_id_no,
            'dob_dt' => $this->dob_dt,
            'gender_fk' => $this->gender_fk,
            'doj_dt' => $this->doj_dt,
            'safety_inducted' => $this->safety_inducted,
            'married' => $this->married,
            'person_on_duty' => $this->person_on_duty,
            'person_authorized_2_incident_area' => $this->person_authorized_2_incident_area,
            'present_address' => $this->present_address,
            'permanent_address' => $this->permanent_address,
            'by_whom' => $this->by_whom,
            'first_incident_reported_to' => $this->first_incident_reported_to,
            'date_time_reported_dt' => $this->date_time_reported_dt,
            'witness1_name' => $this->witness1_name,
            'designation_1' => $this->designation_1,
            'witness2_name' => $this->witness2_name,
            'designation_2' => $this->designation_2,
            'first_aid_given_on_site' => $this->first_aid_given_on_site,
            'name_first_aider' => $this->name_first_aider,
            'victim_taken_hospital' => $this->victim_taken_hospital,
            'name_hospital' => $this->name_hospital,
            'victim_hospital_dischaged' => $this->victim_hospital_dischaged,
            'return_to_work' => $this->return_to_work,
            'victim_influence_alcohol' => $this->victim_influence_alcohol,
            'description_of_incident' => $this->description_of_incident,
            'uploaddocuments_fk' => 0,
            'extend_injury' => $this->extend_injury,
            'activity16' => $this->activity16,
            'relavebt_risk_referenceno' => $this->relavebt_risk_referenceno,
            'control_measure' => $this->control_measure,
            'actions_taken' => $this->actions_taken,
            'site_enginner_name' => $this->site_enginner_name,
            'site_enginner_signature' => $this->site_enginner_signature,
            'project_manager' => $this->project_manager,
            'project_manager_signature' => $this->project_manager_signature,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($formdata_16s_id ,$role='Staff')
    {
        $info = formdata_16::find($formdata_16s_id);

        $this->role = $role;

        $this->injuredvictim_name = $info->injuredvictim_name;
        $this->designation = $info->designation;
        $this->age = $info->age;
        // $this->sproject_location = $this->sproject_location;
        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->doincident_dt = $info->doincident_dt;
        $this->potential_injurytos_fk = $info->potential_injurytos_fk;
        $this->potential_injurytos_other = $info->potential_injurytos_other;
        $this->eml_id_no = $info->eml_id_no;
        $this->dob_dt = $info->dob_dt;
        $this->gender_fk = $info->gender_fk;
        $this->doj_dt = $info->doj_dt;
        $this->safety_inducted = $info->safety_inducted;
        $this->married = $info->married;
        $this->person_on_duty = $info->person_on_duty;
        $this->person_authorized_2_incident_area = $info->person_authorized_2_incident_area;
        $this->present_address = $info->present_address;
        $this->permanent_address = $info->permanent_address;
        $this->by_whom = $info->by_whom;
        $this->first_incident_reported_to = $info->first_incident_reported_to;
        $this->date_time_reported_dt = $info->date_time_reported_dt;
        $this->witness1_name = $info->witness1_name;
        $this->designation_1 = $info->designation_1;
        $this->witness2_name = $info->witness2_name;
        $this->designation_2 = $info->designation_2;
        $this->first_aid_given_on_site = $info->first_aid_given_on_site;
        $this->name_first_aider = $info->name_first_aider;
        $this->victim_taken_hospital = $info->victim_taken_hospital;
        $this->name_hospital = $info->name_hospital;
        $this->victim_hospital_dischaged = $info->victim_hospital_dischaged;
        $this->return_to_work = $info->return_to_work;
        $this->victim_influence_alcohol = $info->victim_influence_alcohol;
        $this->description_of_incident = $info->description_of_incident;
        $this->uploaddocuments_fk = $info->uploaddocuments_fk;
        $this->extend_injury = $info->extend_injury;
        $this->activity16 = $info->activity16;
        $this->relavebt_risk_referenceno = $info->relavebt_risk_referenceno;
        $this->control_measure = $info->control_measure;
        $this->actions_taken = $info->actions_taken;
        $this->site_enginner_name = $info->site_enginner_name;
        $this->site_enginner_signature = $info->site_enginner_signature;
        $this->project_manager = $info->project_manager;
        $this->project_manager_signature = $info->project_manager_signature;




        $this->cid = $info->formdata_16s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_16s_id' => $formdata_16s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'injuredvictim_name' => 'required',
            'designation' => 'required',
            'age' => 'required',
            'designation' => 'required',
            'sproject_location' => 'required',
            'iproject_id_fk' => 'required|not_in:0',
            'doincident_dt' => 'required',
            'potential_injurytos_fk' => 'required',
            'eml_id_no' => 'required',
            'dob_dt' => 'required',
            'gender_fk' => 'required|not_in:0',
            'doj_dt' => 'required',
            'safety_inducted' => 'required',
            'married' => 'required',
            'person_on_duty' => 'required',
            'person_authorized_2_incident_area' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'by_whom' => 'required',
            'first_incident_reported_to' => 'required',
            'date_time_reported_dt' => 'required',
            'witness1_name' => 'required',
            'designation_1' => 'required',
            'witness2_name' => 'required',
            'designation_2' => 'required',
            'first_aid_given_on_site' => 'required',
            'name_first_aider' => 'required',
            // 'victim_taken_hospital' => 'required',
            // 'name_hospital' => 'required',
            'victim_hospital_dischaged' => 'required',
            // 'return_to_work' => 'required',
            'victim_influence_alcohol' => 'required',
            'description_of_incident' => 'required',
            // 'uploaddocuments_fk' => 'required',
            'extend_injury' => 'required',
            'activity16' => 'required',
            'relavebt_risk_referenceno' => 'required',
            'control_measure' => 'required',
            'actions_taken' => 'required',
            'site_enginner_name' => 'required',
            'site_enginner_signature' => 'required',
            'project_manager' => 'required',
            'project_manager_signature' => 'required',
        ]);

        $update = formdata_16::find($cid)->update([
            'injuredvictim_name' => $this->injuredvictim_name,
            'age' => $this->age,
            'designation' => $this->designation,

            'iproject_id_fk' => $this->iproject_id_fk,
            'doincident_dt' => $this->doincident_dt,
            'potential_injurytos_fk' => $this->potential_injurytos_fk,
            'potential_injurytos_other' => $this->potential_injurytos_other,
            'eml_id_no' => $this->eml_id_no,
            'dob_dt' => $this->dob_dt,
            'gender_fk' => $this->gender_fk,
            'doj_dt' => $this->doj_dt,
            'safety_inducted' => $this->safety_inducted,
            'married' => $this->married,
            'person_on_duty' => $this->person_on_duty,
            'person_authorized_2_incident_area' => $this->person_authorized_2_incident_area,
            'present_address' => $this->present_address,
            'permanent_address' => $this->permanent_address,
            'by_whom' => $this->by_whom,
            'first_incident_reported_to' => $this->first_incident_reported_to,
            'date_time_reported_dt' => $this->date_time_reported_dt,
            'witness1_name' => $this->witness1_name,
            'designation_1' => $this->designation_1,
            'witness2_name' => $this->witness2_name,
            'designation_2' => $this->designation_2,
            'first_aid_given_on_site' => $this->first_aid_given_on_site,
            'name_first_aider' => $this->name_first_aider,
            'victim_taken_hospital' => $this->victim_taken_hospital,
            'name_hospital' => $this->name_hospital,
            'victim_hospital_dischaged' => $this->victim_hospital_dischaged,
            'return_to_work' => $this->return_to_work,
            'victim_influence_alcohol' => $this->victim_influence_alcohol,
            'description_of_incident' => $this->description_of_incident,
            'uploaddocuments_fk' => 0,
            'extend_injury' => $this->extend_injury,
            'activity16' => $this->activity16,
            'relavebt_risk_referenceno' => $this->relavebt_risk_referenceno,
            'control_measure' => $this->control_measure,
            'actions_taken' => $this->actions_taken,
            'site_enginner_name' => $this->site_enginner_name,
            'site_enginner_signature' => $this->site_enginner_signature,
            'project_manager' => $this->project_manager,
            'project_manager_signature' => $this->project_manager_signature,

        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    public function headSignature()
    {
        $cid = $this->cid;
        
        $headSignature = formdata_16::find($cid)->update([
            'injuredvictim_name' => $this->injuredvictim_name,
            'age' => $this->age,
            'designation' => $this->designation,

            'iproject_id_fk' => $this->iproject_id_fk,
            'doincident_dt' => $this->doincident_dt,
            'potential_injurytos_fk' => $this->potential_injurytos_fk,
            'potential_injurytos_other' => $this->potential_injurytos_other,
            'eml_id_no' => $this->eml_id_no,
            'dob_dt' => $this->dob_dt,
            'gender_fk' => $this->gender_fk,
            'doj_dt' => $this->doj_dt,
            'safety_inducted' => $this->safety_inducted,
            'married' => $this->married,
            'person_on_duty' => $this->person_on_duty,
            'person_authorized_2_incident_area' => $this->person_authorized_2_incident_area,
            'present_address' => $this->present_address,
            'permanent_address' => $this->permanent_address,
            'by_whom' => $this->by_whom,
            'first_incident_reported_to' => $this->first_incident_reported_to,
            'date_time_reported_dt' => $this->date_time_reported_dt,
            'witness1_name' => $this->witness1_name,
            'designation_1' => $this->designation_1,
            'witness2_name' => $this->witness2_name,
            'designation_2' => $this->designation_2,
            'first_aid_given_on_site' => $this->first_aid_given_on_site,
            'name_first_aider' => $this->name_first_aider,
            'victim_taken_hospital' => $this->victim_taken_hospital,
            'name_hospital' => $this->name_hospital,
            'victim_hospital_dischaged' => $this->victim_hospital_dischaged,
            'return_to_work' => $this->return_to_work,
            'victim_influence_alcohol' => $this->victim_influence_alcohol,
            'description_of_incident' => $this->description_of_incident,
            'uploaddocuments_fk' => 0,
            'extend_injury' => $this->extend_injury,
            'activity16' => $this->activity16,
            'relavebt_risk_referenceno' => $this->relavebt_risk_referenceno,
            'control_measure' => $this->control_measure,
            'actions_taken' => $this->actions_taken,
            'site_enginner_name' => $this->site_enginner_name,
            'site_enginner_signature' => $this->site_enginner_signature,
            'project_manager' => $this->project_manager,
            'project_manager_signature' => $this->project_manager_signature,

        ]);

        if ($headSignature) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($formdata_16s_id)
    {
        $info = formdata_16::find($formdata_16s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->injuredvictim_name . '</strong>',
            'id' => $formdata_16s_id
        ]);
    }



    public function delete($formdata_16s_id)
    {
        $del =  formdata_16::find($formdata_16s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
