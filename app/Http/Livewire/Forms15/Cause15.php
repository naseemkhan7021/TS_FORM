<?php

namespace App\Http\Livewire\Forms15;

use App\Models\forms_15\Cause15 as Forms_15Cause15;
use Livewire\Component;

class Cause15 extends Component
{
    
    public $searchQuery;
    public $cause15s_description, $cause15s_abbr;
    public $cid, $upd_cause15s_description, $upd_cause15s_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $cause15data = Forms_15Cause15::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('cause15s_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('cause15s_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->get();

        return view('livewire.forms15.cause15',[
            'cause15data'=>$cause15data
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->cause15s_description = '';
        $this->cause15s_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'cause15s_description' => 'required',
            'cause15s_abbr' => 'required'
        ]);

        $save = Forms_15Cause15::insert([
            'cause15s_description' => $this->cause15s_description,
            'cause15s_abbr' => $this->cause15s_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($cause15s_id)
    {
        $info = Forms_15Cause15::find($cause15s_id);

        $this->upd_cause15s_description = $info->cause15s_description;
        $this->upd_cause15s_abbr = $info->cause15s_abbr;
        $this->cid = $info->cause15s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'cause15s_id' => $cause15s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_cause15s_description' => 'required',
            'upd_cause15s_abbr' => 'required'
        ], [

            'upd_cause15s_description.required' => 'Enter Activity Description',
            'upd_cause15s_abbr.required' => 'Activity Abbrivation require'
        ]);

        $update = Forms_15Cause15::find($cid)->update([
            'cause15s_description' => $this->upd_cause15s_description,
            'cause15s_abbr' => $this->upd_cause15s_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($cause15s_id)
    {
        $info = Forms_15Cause15::find($cause15s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->cause15s_description . '</strong>',
            'id' => $cause15s_id
        ]);
    }



    public function delete($cause15s_id)
    {
        $del =  Forms_15Cause15::find($cause15s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
