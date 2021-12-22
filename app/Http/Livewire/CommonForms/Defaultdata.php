<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\Company;
use App\Models\common_forms\Defaultdata as Formsdefaultdata;
use App\Models\common_forms\Department;
use App\Models\projcon\Project;
use Livewire\Component;

class Defaultdata extends Component
{
    protected $listeners = ['delete'];
    
    public $searchQuery;
    public $description,$ibc_id_fk,$iproject_id_fk,$idepartment_id_fk;
    public $cid,$addDefault;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
        $this->addDefaultdata = false;
    }

    public function render()
    {

        # render with search query
        $formsDefaultdata = Formsdefaultdata::join('companies', 'companies.ibc_id', '=', 'defaultdatas.ibc_id_fk')
        ->join('projects', 'projects.iproject_id', '=', 'defaultdatas.iproject_id_fk')
        ->join('departments', 'departments.idepartment_id', '=', 'defaultdatas.idepartment_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('description', 'like', '%' . $this->searchQuery . '%');
            })->get();
            $companyData = Company::get();
            $departmentData = Department::get();
            $projectData = Project::get();

            count($formsDefaultdata) == 1 ? $this->addDefaultdata = false : $this->addDefaultdata = true;

        return view('livewire.common-forms.defaultdata',[
            'formsDefaultdata'=>$formsDefaultdata,'companyData'=>$companyData,'projectData'=>$projectData,'departmentData'=>$departmentData
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->description='';
        $this->ibc_id_fk='';
        $this->iproject_id_fk='';
        $this->idepartment_id_fk='';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }



    public function save()
    {
        $this->resetValidation();
        # save
        $this->validate([
            'description' => 'required',
            'ibc_id_fk' => 'required|not_in:0',
            'iproject_id_fk' => 'required|not_in:0',
            'idepartment_id_fk' => 'required|not_in:0',
        ]);

        $save = Formsdefaultdata::insert([
            'description' => $this->description,
            'ibc_id_fk' => $this->ibc_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($idefault_id)
    {
        # code...
        $info = Formsdefaultdata::find($idefault_id);

        $this->description = $info->description;
        $this->ibc_id_fk = $info->ibc_id_fk;
        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->idepartment_id_fk = $info->idepartment_id_fk;

        $this->cid = $info->idefault_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'idefault_id' => $idefault_id
        ]);
    }

    public function update()
    {
        $this->resetValidation();
        # update method
        $cid = $this->cid;
        $this->validate([
            'description' => 'required',
            'ibc_id_fk' => 'required|not_in:0',
            'iproject_id_fk' => 'required|not_in:0',
            'idepartment_id_fk' => 'required|not_in:0',
        ]);

        $update = Formsdefaultdata::find($cid)->update([
            'description' => $this->description,
            'ibc_id_fk' => $this->ibc_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($idefault_id)
    {
        # delete
        $info = Formsdefaultdata::find($idefault_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->description . '</string>',
            'id' => $idefault_id
        ]);
    }

    public function delete($idefault_id)
    {
        $del =  Formsdefaultdata::find($idefault_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    public function clearValuesandValidation()
    {
        # validaton
        $this->resetValidation();
        # value
    }
}
