<?php

namespace App\Http\Livewire\Forms15;

use App\Models\forms_15\ImdCorrection as Forms_15ImdCorrection;
use Livewire\Component;

class ImdCorrection extends Component
{
    
    public $searchQuery;
    public $imd_corrections_description, $imd_corrections_abbr;
    public $cid, $upd_imd_corrections_description, $upd_imd_corrections_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        
        $imdcorrectiondata = Forms_15ImdCorrection::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('imd_corrections_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('imd_corrections_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->get();

        return view('livewire.forms15.imd-correction',[
            'imdcorrectiondata'=>$imdcorrectiondata
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->imd_corrections_description = '';
        $this->imd_corrections_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'imd_corrections_description' => 'required',
            'imd_corrections_abbr' => 'required'
        ]);

        $save = Forms_15ImdCorrection::insert([
            'imd_corrections_description' => $this->imd_corrections_description,
            'imd_corrections_abbr' => $this->imd_corrections_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($imd_corrections_id)
    {
        $info = Forms_15ImdCorrection::find($imd_corrections_id);

        $this->upd_imd_corrections_description = $info->imd_corrections_description;
        $this->upd_imd_corrections_abbr = $info->imd_corrections_abbr;
        $this->cid = $info->imd_corrections_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'imd_corrections_id' => $imd_corrections_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_imd_corrections_description' => 'required',
            'upd_imd_corrections_abbr' => 'required'
        ], [

            'upd_imd_corrections_description.required' => 'Enter Activity Description',
            'upd_imd_corrections_abbr.required' => 'Activity Abbrivation require'
        ]);

        $update = Forms_15ImdCorrection::find($cid)->update([
            'imd_corrections_description' => $this->upd_imd_corrections_description,
            'imd_corrections_abbr' => $this->upd_imd_corrections_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($imd_corrections_id)
    {
        $info = Forms_15ImdCorrection::find($imd_corrections_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->imd_corrections_description . '</strong>',
            'id' => $imd_corrections_id
        ]);
        
    }
    
    
    
    public function deleteItem($imd_corrections_id)
    {
        echo 'confirm =>';
        $del =  Forms_15ImdCorrection::find($imd_corrections_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
