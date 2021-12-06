<?php

namespace App\Http\Livewire\Forms15;

use App\Models\forms_15\ContributingCause as Forms_15ContributingCause;
use Livewire\Component;

class ContributingCause extends Component
{

    public $searchQuery;
    public $contributing_causes_description, $contributing_causes_abbr;
    public $cid, $upd_contributing_causes_description, $upd_contributing_causes_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        
        $contributingcausedata = Forms_15ContributingCause::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('contributing_causes_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('contributing_causes_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->get();


        return view('livewire.forms15.contributing-cause',[
            'contributingcausedata'=>$contributingcausedata
        ]);
    }

    
    
    public function OpenAddCountryModal()
    {
        $this->contributing_causes_description = '';
        $this->contributing_causes_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'contributing_causes_description' => 'required',
            'contributing_causes_abbr' => 'required'
        ]);

        $save = Forms_15ContributingCause::insert([
            'contributing_causes_description' => $this->contributing_causes_description,
            'contributing_causes_abbr' => $this->contributing_causes_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($contributing_causes_id)
    {
        $info = Forms_15ContributingCause::find($contributing_causes_id);

        $this->upd_contributing_causes_description = $info->contributing_causes_description;
        $this->upd_contributing_causes_abbr = $info->contributing_causes_abbr;
        $this->cid = $info->contributing_causes_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'contributing_causes_id' => $contributing_causes_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_contributing_causes_description' => 'required',
            'upd_contributing_causes_abbr' => 'required'
        ], [

            'upd_contributing_causes_description.required' => 'Enter Activity Description',
            'upd_contributing_causes_abbr.required' => 'Activity Abbrivation require'
        ]);

        $update = Forms_15ContributingCause::find($cid)->update([
            'contributing_causes_description' => $this->upd_contributing_causes_description,
            'contributing_causes_abbr' => $this->upd_contributing_causes_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($contributing_causes_id)
    {
        $info = Forms_15ContributingCause::find($contributing_causes_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->contributing_causes_description . '</strong>',
            'id' => $contributing_causes_id
        ]);
    }



    public function delete($contributing_causes_id)
    {
        $del =  Forms_15ContributingCause::find($contributing_causes_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
