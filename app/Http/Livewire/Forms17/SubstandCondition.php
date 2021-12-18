<?php

namespace App\Http\Livewire\Forms17;

use App\Models\forms_17\substandcondition as Forms_17Substandcondition;
use Livewire\Component;

class SubstandCondition extends Component
{
    public $searchQuery,$role;
    public $substandcondition_description, $substandcondition_abbr;
    public $cid, $upd_substandcondition_description, $upd_substandcondition_abbr;

    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render() 
    {
        $substandcondition = Forms_17Substandcondition::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('substandcondition_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('substandcondition_abbr', 'like', '%' . $this->searchQuery . '%');
        })->get();

        return view('livewire.forms17.substand-condition',[
            'substandcondition'=>$substandcondition
        ]);
    }

    
     
    public function OpenAddCountryModal()
    {
        $this->substandcondition_description = '';
        $this->substandcondition_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'substandcondition_description' => 'required',
            'substandcondition_abbr' => 'required'
        ]);

        $save = Forms_17Substandcondition::insert([
            'substandcondition_description' => $this->substandcondition_description,
            'substandcondition_abbr' => $this->substandcondition_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($substandcondition_id ,$role = 'Staff')
    {
        $info = Forms_17Substandcondition::find($substandcondition_id);

        $this->role = $role;

        $this->upd_substandcondition_description = $info->substandcondition_description;
        $this->upd_substandcondition_abbr = $info->substandcondition_abbr;
        $this->cid = $info->substandcondition_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'substandcondition_id' => $substandcondition_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_substandcondition_description' => 'required',
            'upd_substandcondition_abbr' => 'required'
        ], [

            'upd_substandcondition_description.required' => 'Enter incident Description',
            'upd_substandcondition_abbr.required' => 'coworker statement Abbrivation require'
        ]);

        $update = Forms_17Substandcondition::find($cid)->update([
            'substandcondition_description' => $this->upd_substandcondition_description,
            'substandcondition_abbr' => $this->upd_substandcondition_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($substandcondition_id)
    {
        $info = Forms_17Substandcondition::find($substandcondition_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->substandcondition_description . '</strong>',
            'id' => $substandcondition_id
        ]);
    }



    public function delete($substandcondition_id)
    {
        $del =  Forms_17Substandcondition::find($substandcondition_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
