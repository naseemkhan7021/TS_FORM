<?php

namespace App\Http\Livewire\Forms18;

use App\Models\common_forms\Defaultdata;
use App\Models\common_forms\Dept_Default_Docs;
use App\Models\common_forms\Projects;
use App\Models\forms_00\formdata_00;
use App\Models\forms_18\formdata18 as Forms_18Formdata18;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDF;

class Formdata18 extends Component
{
    protected $listeners = ['delete','selectedProjectID'];

    public $extinguisher_no, $location, $type, $size, $date_of_refilling, $date_of_inspection, $pressure_gauge_or_safety_pin_status, $seal_intact_and_not_corroded, $name_of_responsible_person, $due_for_next_refilling, $due_for_next_inspection, $inspected_by_name,$inspected_by_signature,$inspected_by_designation,$inspected_by_date;
    public $iproject_id_fk,$ibc_id_fk, $idepartment_id_fk;
    public $cid,$searchQuery, $sproject_location,$ddd_id_fk,$userID,$old_iproject_id_fk;
    public $print_disable;

    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }

    public function mount()
    {
        # code...
        $this->searchQuery = '';
        $this->ddd_id_fk = 18;
        $this->iproject_id_fk = session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*' ? session('globleSelectedProjectID') : 0;

        $this->userID = Auth::user()->id;
    }

    public function render()
    {
        $form18Data = Forms_18Formdata18::select('formdata_18s.*','projects.sproject_name')
            ->join('projects', 'projects.iproject_id', '=', 'formdata_18s.iproject_id_fk')
            ->where(['formdata_18s.bactive' => '1', 'formdata_18s.user_created' => $this->userID])
            ->when(session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*', function ($data) {
                # code...
                $this->print_disable = false;
                $data->where('iproject_id_fk', '=', session('globleSelectedProjectID'))
                    ->where(['formdata_18s.bactive' => '1', 'formdata_18s.user_created' => $this->userID]);
            })
            ->when($this->searchQuery != '', function ($query) {
                $query->where(['formdata_18s.bactive' => '1', 'formdata_18s.user_created' => $this->userID])
                    ->where('pressure_gauge_or_safety_pin_status', 'like', '%' . $this->searchQuery . '%')
                    ->where('location', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('name_of_responsible_person', 'like', '%' . $this->searchQuery . '%');
            })
            ->orderBy('formdata_18s_id')->get();
            $this->print_disable = session('globleSelectedProjectID') && session('globleSelectedProjectID') == '*' ? true : false;
            // $this->form18Data = $form18Data;
            // dd($form18Data);
            $projectData = Projects::where(['projects.bactive'=> '1','projects.user_created'=>$this->userID])->get();
        return view('livewire.forms18.formdata18', [
            'form18Data' => $form18Data,'projectData'=>$projectData
        ]);
    }


    public function OpenAddCountryModal()
    {
        // $this->iproject_id_fk = '0';
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
        $this->inspected_by_date=Carbon::now()->format(env('DATE_FORMAT_YMD'));
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
                // $this->checkedCountry = [];
            }
        }
    }



    public function OpenEditCountryModal($formdata_18s_id)
    {
        $info = Forms_18Formdata18::find($formdata_18s_id);

        $this->ibc_id_fk=$info->ibc_id_fk;
        $this->idepartment_id_fk=$info->idepartment_id_fk;
        $this->old_iproject_id_fk = $info->iproject_id_fk; // for comparing
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

    public function ganaratePDF()
    {
        if (session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*') {
            # code...
            $form18Data = Forms_18Formdata18::join('projects', 'projects.iproject_id', '=', 'formdata_18s.iproject_id_fk')
            ->where(['formdata_18s.bactive' => '1', 'formdata_18s.user_created' => $this->userID,'formdata_18s.iproject_id_fk'=>session('globleSelectedProjectID')])->get();
        }
        $defaultData = Defaultdata::find(1)->join('companies', 'companies.ibc_id', '=', 'defaultdatas.ibc_id_fk')->join('projects', 'projects.iproject_id', '=', 'defaultdatas.iproject_id_fk')->join('departments', 'departments.idepartment_id', '=', 'defaultdatas.idepartment_id_fk')->get();
        
        // dd($defaultData);
        $data = [
            'formHeader'=>Dept_Default_Docs::find($this->ddd_id_fk),
            'defaultData'=>$defaultData[0],
            'form18Data'=>$form18Data,
        ];
        $pdf = PDF::loadView('exports.Forms.form18', $data)->setPaper('A4', 'landscape')->output(); //
        return response()->streamDownload(fn () => print($pdf),'form18_'.time().'.pdf');

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
