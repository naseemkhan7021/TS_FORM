<?php

namespace App\Http\Livewire\Forms15;

use App\Models\forms_15\NatureOfPotentialInjury as Form15NatureOfPotentialInjury;
use Livewire\Component;

class NatureOfPotentialInjury extends Component
{
    
    public $searchQuery;
    public $nature_of_potential_injuries_description, $nature_of_potential_injuries_abbr;
    public $cid, $upd_nature_of_potential_injuries_description, $upd_nature_of_potential_injuries_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
          
        $natureofpotentialinjurydata = Form15NatureOfPotentialInjury::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('nature_of_potential_injuries_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('nature_of_potential_injuries_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->get();

        return view('livewire.forms15.nature-of-potential-injury',[
            'natureofpotentialinjurydata'=>$natureofpotentialinjurydata
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->nature_of_potential_injuries_description = '';
        $this->nature_of_potential_injuries_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'nature_of_potential_injuries_description' => 'required',
            'nature_of_potential_injuries_abbr' => 'required'
        ]);

        $save = Form15NatureOfPotentialInjury::insert([
            'nature_of_potential_injuries_description' => $this->nature_of_potential_injuries_description,
            'nature_of_potential_injuries_abbr' => $this->nature_of_potential_injuries_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($nature_of_potential_injuries_id)
    {
        $info = Form15NatureOfPotentialInjury::find($nature_of_potential_injuries_id);

        $this->upd_nature_of_potential_injuries_description = $info->nature_of_potential_injuries_description;
        $this->upd_nature_of_potential_injuries_abbr = $info->nature_of_potential_injuries_abbr;
        $this->cid = $info->nature_of_potential_injuries_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'nature_of_potential_injuries_id' => $nature_of_potential_injuries_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_nature_of_potential_injuries_description' => 'required',
            'upd_nature_of_potential_injuries_abbr' => 'required'
        ], [

            'upd_nature_of_potential_injuries_description.required' => 'Enter Nature Of Potential Injuries Description',
            'upd_nature_of_potential_injuries_abbr.required' => 'Nature Of Potential Injuries Abbrivation require'
        ]);

        $update = Form15NatureOfPotentialInjury::find($cid)->update([
            'nature_of_potential_injuries_description' => $this->upd_nature_of_potential_injuries_description,
            'nature_of_potential_injuries_abbr' => $this->upd_nature_of_potential_injuries_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($nature_of_potential_injuries_id)
    {
        $info = Form15NatureOfPotentialInjury::find($nature_of_potential_injuries_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->nature_of_potential_injuries_description . '</strong>',
            'id' => $nature_of_potential_injuries_id
        ]);
        
        // dd($YN);
        // $this->deleteItem($nature_of_potential_injuries_id);
    }
    
    
    
    public function deleteItem($nature_of_potential_injuries_id)
    {
        // echo 'confirm =>';
        $del =  Form15NatureOfPotentialInjury::find($nature_of_potential_injuries_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
