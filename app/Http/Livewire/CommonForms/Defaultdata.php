<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\Defaultdata as Formsdefaultdata;
use Livewire\Component;

class Defaultdata extends Component
{
    public $searchQuery;
    public $description;
    public $cid, $upd_description;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
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
            })->orderBy('idefault_id', 'dec')->paginate(10);

        return view('livewire.common-forms.defaultdata',[
            'formsDefaultdata'=>$formsDefaultdata
        ]);
    }



    public function save()
    {
        # save
        $this->validate([
            'description' => 'required',
        ]);

        $save = Formsdefaultdata::insert([
            'description' => $this->description,
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

        $this->upd_description = $info->description;
        $this->cid = $info->idefault_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'idefault_id' => $idefault_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_description' => 'required',
        ]);

        $update = Formsdefaultdata::find($cid)->update([
            'description' => $this->upd_description,
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
}
