<?php

namespace App\Http\Livewire\Forms17;

use App\Models\forms_17\formdata_17;
use Livewire\Component;

class Formdata17 extends Component
{

    public $searchQuery,$role;
    public $incident_description, $coworker_statement;
    public $cid, $upd_incident_description, $upd_coworker_statement;

    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        
        $form17data = formdata_17::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('incident_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('coworker_statement', 'like', '%' . $this->searchQuery . '%');
        })
            ->orderBy('formdata_17s_id')->paginate(10);

        return view('livewire.forms17.formdata17',[
            'form17data'=>$form17data
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->incident_description = '';
        $this->coworker_statement = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'incident_description' => 'required',
            'coworker_statement' => 'required'
        ]);

        $save = formdata_17::insert([
            'incident_description' => $this->incident_description,
            'coworker_statement' => $this->coworker_statement,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($formdata_17s_id ,$role = 'Staff')
    {
        $info = formdata_17::find($formdata_17s_id);

        $this->role = $role;

        $this->upd_incident_description = $info->incident_description;
        $this->upd_coworker_statement = $info->coworker_statement;
        $this->cid = $info->formdata_17s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_17s_id' => $formdata_17s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_incident_description' => 'required',
            'upd_coworker_statement' => 'required'
        ], [

            'upd_incident_description.required' => 'Enter incident Description',
            'upd_coworker_statement.required' => 'coworker statement Abbrivation require'
        ]);

        $update = formdata_17::find($cid)->update([
            'incident_description' => $this->upd_incident_description,
            'coworker_statement' => $this->upd_coworker_statement
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($formdata_17s_id)
    {
        $info = formdata_17::find($formdata_17s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->incident_description . '</strong>',
            'id' => $formdata_17s_id
        ]);
    }



    public function delete($formdata_17s_id)
    {
        $del =  formdata_17::find($formdata_17s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
