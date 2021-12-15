<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\Company;
use App\Models\common_forms\Department as Formsdepartment;
use Livewire\Component;

class Department extends Component
{
    public $searchQuery;
    public $sdepartment_name, $sdepartment_abbr , $ibc_id_fk;
    public $cid, $upd_sdepartment_name, $upd_sdepartment_abbr , $upd_ibc_id_fk;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $companydata = Company::all();

        # render with search query
        $formsDepartment = Formsdepartment::join('companies', 'companies.ibc_id', '=', 'departments.ibc_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('sdepartment_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sdepartment_abbr', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('idepartment_id', 'asc')->paginate(10);

        return view('livewire.common-forms.department',[
            'formsDepartment'=>$formsDepartment ,'companydata' => $companydata ,
        ]);
    }


    public function OpenAddCountryModal(){
        $this->sdepartment_name = '';
        $this->sdepartment_abbr = '';
        $this->ibc_id_fk = 1;
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        # save
        $this->validate([
            'sdepartment_name' => 'required',
            'sdepartment_abbr' => 'required',
        ]);

        $save = Formsdepartment::insert([
            'sdepartment_abbr' => $this->sdepartment_abbr,
            'sdepartment_name' => $this->sdepartment_name,
            'ibc_id_fk' => $this->ibc_id_fk,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($idepartment_id)
    {
        # code...
        $info = Formsdepartment::find($idepartment_id);

        $this->upd_sdepartment_name = $info->sdepartment_name;
        $this->upd_sdepartment_abbr = $info->sdepartment_abbr;

        $this->cid = $info->idepartment_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'idepartment_id' => $idepartment_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_sdepartment_name' => 'required',
            'upd_sdepartment_abbr' => 'required',
        ], [
            'upd_sdepartment_name.required' => 'Enter department description',
            'upd_sdepartment_abbr.required' => 'department Abbrivation require',
        ]);

        $update = Formsdepartment::find($cid)->update([
            'sdepartment_name' => $this->upd_sdepartment_name,
            'sdepartment_abbr' => $this->upd_sdepartment_abbr,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($idepartment_id)
    {
        # delete
        $info = Formsdepartment::find($idepartment_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->sdepartment_name . '</string>',
            'id' => $idepartment_id
        ]);
    }

    public function delete($idepartment_id)
    {
        $del =  Formsdepartment::find($idepartment_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
