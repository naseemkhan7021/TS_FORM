<?php

namespace App\Http\Livewire\Forms15;

use App\Models\forms_15\ImdAction as Forms_15ImdAction;
use Livewire\Component;

class ImdAction extends Component
{
    public $searchQuery;
    public $imd_actions_description, $imd_actions_abbr;
    public $cid, $upd_imd_actions_description, $upd_imd_actions_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        
        $imdactiondata = Forms_15ImdAction::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('imd_actions_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('imd_actions_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->get();

        return view('livewire.forms15.imd-action',[
            'imdactiondata'=>$imdactiondata
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->imd_actions_description = '';
        $this->imd_actions_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'imd_actions_description' => 'required',
            'imd_actions_abbr' => 'required'
        ]);

        $save = Forms_15ImdAction::insert([
            'imd_actions_description' => $this->imd_actions_description,
            'imd_actions_abbr' => $this->imd_actions_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($imd_actions_id)
    {
        $info = Forms_15ImdAction::find($imd_actions_id);

        $this->upd_imd_actions_description = $info->imd_actions_description;
        $this->upd_imd_actions_abbr = $info->imd_actions_abbr;
        $this->cid = $info->imd_actions_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'imd_actions_id' => $imd_actions_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_imd_actions_description' => 'required',
            'upd_imd_actions_abbr' => 'required'
        ], [

            'upd_imd_actions_description.required' => 'Enter Activity Description',
            'upd_imd_actions_abbr.required' => 'Activity Abbrivation require'
        ]);

        $update = Forms_15ImdAction::find($cid)->update([
            'imd_actions_description' => $this->upd_imd_actions_description,
            'imd_actions_abbr' => $this->upd_imd_actions_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($imd_actions_id)
    {
        $info = Forms_15ImdAction::find($imd_actions_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->imd_actions_description . '</strong>',
            'id' => $imd_actions_id
        ]);
        // dd($YN);
        // $this->delete($imd_actions_id);
    }



    public function delete($imd_actions_id)
    {
        $del =  Forms_15ImdAction::find($imd_actions_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
