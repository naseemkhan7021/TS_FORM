<?php

namespace App\Http\Livewire\Forms18;

use App\Models\common_forms\Projects;
use App\Models\forms_00\formdata_00;
use App\Models\forms_18\formdata18 as Forms_18Formdata18;
use Carbon\Carbon;
use Livewire\Component;

class Formdata18 extends Component
{
    protected $listeners = ['delete'];

    public $extinguisher_no, $location, $type, $size, $date_of_refilling, $date_of_inspection, $pressure_gauge_or_safety_pin_status, $seal_intact_and_not_corroded, $name_of_responsible_person, $due_for_next_refilling, $due_for_next_inspection, $inspected_by_name,$inspected_by_signature,$inspected_by_designation,$inspected_by_date;
    public $iproject_id_fk,$ibc_id_fk, $idepartment_id_fk;
    public $cid,$searchQuery, $sproject_location,$ddd_id_fk;

    public function mount()
    {
        # code...
        $this->searchQuery = '';
        $this->ddd_id_fk = 18;
    }

    public function render()
    {
        $form18Data = Forms_18Formdata18::select('formdata_18s.*','projects.sproject_name')
            ->join('projects', 'projects.iproject_id', '=', 'formdata_18s.iproject_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('pressure_gauge_or_safety_pin_status', 'like', '%' . $this->searchQuery . '%')
                    ->where('location', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('name_of_responsible_person', 'like', '%' . $this->searchQuery . '%');
            })
            ->orderBy('formdata_18s_id')->get();

            $projectData = Projects::all();
        return view('livewire.forms18.formdata18', [
            'form18Data' => $form18Data,'projectData'=>$projectData
        ]);
    }


    public function OpenAddCountryModal()
    {
        $this->iproject_id_fk = '0';
        $this->extinguisher_no = '';
        $this->location = '';
        $this->type = '';
        $this->size = '';
        $this->date_of_refilling = '';
        $this->seal_intact_and_not_corroded = 'Yes';
        $this->date_of_inspection = '';
        $this->pressure_gauge_or_safety_pin_status = 'Good';
        $this->name_of_responsible_person = '';
        $this->due_for_next_refilling = '';
        $this->due_for_next_inspection = '';
        $this->inspected_by_signature='';
        $this->inspected_by_designation='';
        $this->inspected_by_date=Carbon::now()->format('Y-m-d');
        $this->inspected_by_name='';

        // dd($this->inspected_by_date);
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'iproject_id_fk' => 'required|not_in:0',
            'extinguisher_no' => 'required',
            'location' => 'required',
            'type' => 'required',
            'size' => 'required',
            'date_of_refilling' => 'required',
            'date_of_inspection' => 'required',
            'pressure_gauge_or_safety_pin_status' => 'required',
            'seal_intact_and_not_corroded' => 'required',
            'name_of_responsible_person' => 'required',
            'due_for_next_refilling' => 'required',
            'due_for_next_inspection' => 'required',
            'inspected_by_signature' => 'required|not_in:0',
            'inspected_by_designation' => 'required',
            'inspected_by_date' => 'required',
            'inspected_by_name' => 'required',
        ]);

        $save = Forms_18Formdata18::insert([
            'iproject_id_fk' => $this->iproject_id_fk,
            'extinguisher_no' => $this->extinguisher_no,
            'location' => $this->location,
            'type' => $this->type,
            'size' => $this->size,
            'date_of_refilling' => $this->date_of_refilling,
            'date_of_inspection' => $this->date_of_inspection,
            'pressure_gauge_or_safety_pin_status' => $this->pressure_gauge_or_safety_pin_status,
            'seal_intact_and_not_corroded' => $this->seal_intact_and_not_corroded,
            'name_of_responsible_person' => $this->name_of_responsible_person,
            'due_for_next_refilling' => $this->due_for_next_refilling,
            'due_for_next_inspection' => $this->due_for_next_inspection,
            'inspected_by_signature' => $this->inspected_by_signature,
            'inspected_by_designation' => $this->inspected_by_designation,
            'inspected_by_date' => $this->inspected_by_date,
            'inspected_by_name' => $this->inspected_by_name,
        ]);

        if ($save) {
            $getCounter = formdata_00::where([
                'formdata_00s.iproject_id_fk' => $this->iproject_id_fk,
                'formdata_00s.idepartment_id_fk' => $this->idepartment_id_fk,
                'formdata_00s.ibc_id_fk' => $this->ibc_id_fk,
                'formdata_00s.ddd_id_fk' => $this->ddd_id_fk
            ])->get('counter')[0]->counter + 1;

            $updateformsCounter = formdata_00::where([
                'formdata_00s.iproject_id_fk' => $this->iproject_id_fk,
                'formdata_00s.idepartment_id_fk' => $this->idepartment_id_fk,
                'formdata_00s.ibc_id_fk' => $this->ibc_id_fk,
                'formdata_00s.ddd_id_fk' => $this->ddd_id_fk
            ])->update(['counter' => $getCounter]);
            if ($updateformsCounter) {
                # code...
                $this->dispatchBrowserEvent('CloseAddCountryModal');
                // $this->checkedCountry = [];
            }
        }
    }



    public function OpenEditCountryModal($formdata_18s_id)
    {
        $info = Forms_18Formdata18::find($formdata_18s_id);

        $this->ibc_id_fk=$info->ibc_id_fk;
        $this->idepartment_id_fk=$info->idepartment_id_fk;
        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->extinguisher_no = $info->extinguisher_no;
        $this->location = $info->location;
        $this->type = $info->type;
        $this->size = $info->size;
        $this->date_of_refilling = $info->date_of_refilling;
        $this->seal_intact_and_not_corroded = $info->seal_intact_and_not_corroded;
        $this->date_of_inspection = $info->date_of_inspection;
        $this->pressure_gauge_or_safety_pin_status = $info->pressure_gauge_or_safety_pin_status;
        $this->name_of_responsible_person = $info->name_of_responsible_person;
        $this->due_for_next_refilling = $info->due_for_next_refilling;
        $this->due_for_next_inspection = $info->due_for_next_inspection;
        $this->inspected_by_designation = $info->inspected_by_designation;
        $this->inspected_by_date = $info->inspected_by_date;
        $this->inspected_by_name = $info->inspected_by_name;
        $this->inspected_by_signature = $info->inspected_by_signature;

        $this->cid = $info->formdata_18s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_18s_id' => $formdata_18s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'iproject_id_fk' => 'required|not_in:0',
            'extinguisher_no' => 'required',
            'location' => 'required',
            'type' => 'required',
            'size' => 'required',
            'date_of_refilling' => 'required',
            'date_of_inspection' => 'required',
            'pressure_gauge_or_safety_pin_status' => 'required',
            'seal_intact_and_not_corroded' => 'required',
            'name_of_responsible_person' => 'required',
            'due_for_next_refilling' => 'required',
            'due_for_next_inspection' => 'required',
            'inspected_by_signature' => 'required|not_in:0',
            'inspected_by_designation' => 'required',
            'inspected_by_date' => 'required',
            'inspected_by_name' => 'required',
        ]);

        $update = Forms_18Formdata18::find($cid)->update([
            'iproject_id_fk' => $this->iproject_id_fk,
            'extinguisher_no' => $this->extinguisher_no,
            'location' => $this->location,
            'type' => $this->type,
            'size' => $this->size,
            'date_of_refilling' => $this->date_of_refilling,
            'date_of_inspection' => $this->date_of_inspection,
            'pressure_gauge_or_safety_pin_status' => $this->pressure_gauge_or_safety_pin_status,
            'seal_intact_and_not_corroded' => $this->seal_intact_and_not_corroded,
            'name_of_responsible_person' => $this->name_of_responsible_person,
            'due_for_next_refilling' => $this->due_for_next_refilling,
            'due_for_next_inspection' => $this->due_for_next_inspection,
            'inspected_by_signature' => $this->inspected_by_signature,
            'inspected_by_designation' => $this->inspected_by_designation,
            'inspected_by_date' => $this->inspected_by_date,
            'inspected_by_name' => $this->inspected_by_name,

        ]);
        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($formdata_18s_id)
    {
        $info = Forms_18Formdata18::find($formdata_18s_id);
        $YN = $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->extinguisher_no . '</strong>',
            'id' => $formdata_18s_id
        ]);
        // dd($YN);
        // $this->delete($formdata_18s_id);
    }


    public function delete($formdata_18s_id)
    {
        $del =  Forms_18Formdata18::find($formdata_18s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    public function clearValidationf()
    {
        # code...
        $this->resetValidation();
    }
}
