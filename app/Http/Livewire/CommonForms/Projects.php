<?php

namespace App\Http\Livewire\CommonForms;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\common_forms\Company;

use App\Models\common_forms\Projects as Formsprojects;
use App\Models\common_forms\Department as Formsdepartment;
use App\Models\forms_00\formdata_00;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class Projects extends Component
{

    public $searchQuery;
    public $sproject_name, $sproject_abbr, $sproject_location, $idepartment_id_fk, $ibc_id_fk;
    public $cid, $upd_sproject_name, $upd_sproject_abbr, $upd_sproject_location, $upd_idepartment_id_fk, $upd_ibc_id_fk;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        # render with search query
        $companydata = Company::all();

        $formsDepartment = Formsdepartment::all();

        $formsProjects = Formsprojects::join('companies', 'companies.ibc_id', '=', 'projects.ibc_id_fk')
            ->join('departments', 'departments.idepartment_id', '=', 'projects.idepartment_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('sproject_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sproject_abbr', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sproject_location', 'like', '%' . $this->searchQuery . '%');
            })->get();

        return view('livewire.common-forms.projects', [
            'formsProjects' => $formsProjects, 'companydata' => $companydata, 'formsDepartment' => $formsDepartment,
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->sproject_name = '';
        $this->sproject_abbr = '';
        $this->sproject_location = '';
        $this->ibc_id_fk = 1;

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        # save
        $this->validate([
            'sproject_name' => 'required',
            'sproject_abbr' => 'required',
            'sproject_location' => 'required',
            'ibc_id_fk' => 'required',
            'idepartment_id_fk' => 'required',

        ]);

        $save = Formsprojects::insert([
            'ibc_id_fk' => $this->ibc_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'sproject_abbr' => $this->sproject_abbr,
            'sproject_name' => $this->sproject_name,
            'sproject_location' => $this->sproject_location,
        ]);

        if ($save) {
            # code...
            // Add data to form 00 Section V
            $usp_paytempID = DB::getPdo()->lastInsertId();
            $templatedata = DB::table('dept_default_docs')->get();
            $iCounter = 1;

            foreach ($templatedata as $tempdate) {
                $savebody = formdata_00::insert([
                    'ibc_id_fk' => $this->ibc_id_fk,
                    'idepartment_id_fk' => $this->idepartment_id_fk,
                    'iproject_id_fk' => $usp_paytempID,
                    'document_id_fk' => 1,
                    'sr_no' => $iCounter,
                    'document_name' => $tempdate->document_name,
                    'document_code' => $tempdate->document_code,
                    'counter' => 0,

                ]);
                ++$iCounter;
            }
            if ($savebody) {
                # code...
                $this->dispatchBrowserEvent('CloseAddCountryModal');
            }
        }
    }

    public function OpenEditCountryModal($iproject_id)
    {
        # code...
        $info = Formsprojects::find($iproject_id);
        $this->upd_idepartment_id_fk = $info->idepartment_id_fk;
        $this->upd_ibc_id_fk = $info->ibc_id_fk;

        $this->upd_sproject_name = $info->sproject_name;
        $this->upd_sproject_abbr = $info->sproject_abbr;
        $this->upd_sproject_location = $info->sproject_location;
        $this->cid = $info->iproject_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'iproject_id' => $iproject_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_sproject_name' => 'required',
            'upd_sproject_abbr' => 'required',
            'upd_sproject_location' => 'required'
        ], [
            'upd_sproject_name.required' => 'Enter subactivity description',
            'upd_sproject_abbr.required' => 'subactivity Abbrivation require',
            'upd_sproject_location.required' => 'sproject location require',
        ]);

        $update = Formsprojects::find($cid)->update([
            'sproject_name' => $this->upd_sproject_name,
            'sproject_abbr' => $this->upd_sproject_abbr,
            'sproject_location' => $this->upd_sproject_location,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($iproject_id)
    {
        # delete
        $info = Formsprojects::find($iproject_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->sproject_name . '</string>',
            'iproject_id' => $iproject_id
        ]);
        $this->delete($iproject_id);
    }

    public function delete($iproject_id)
    {
        $del =  Formsprojects::find($iproject_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
