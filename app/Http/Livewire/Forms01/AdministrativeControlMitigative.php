<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\administrative_control_mitigative;
use Livewire\Component;

class AdministrativeControlMitigative extends Component
{
    public $searchQuery;
    public $administrative_control_mitigative_description, $administrative_control_mitigative_abbr,$administrative_control_mitigative_value;
    public $cid, $upd_administrative_control_mitigative_description, $upd_administrative_control_mitigative_abbr,$upd_administrative_control_mitigative_value;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        # render with search query
        $administrativecontrolmitigative = Administrative_Control_Mitigative::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('administrative_control_mitigative_description', 'like', '%' . $this->searchQuery . '%')
                ->where('administrative_control_mitigative_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('administrative_control_mitigative_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('administrative_control_mitigative_id', 'dec')->paginate(10);

        return view('livewire.forms01.administrative-control-mitigative',[
            'administrativecontrolmitigative'=>$administrativecontrolmitigative
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->administrative_control_mitigative_description = '';
        $this->administrative_control_mitigative_value = '';
        $this->administrative_control_mitigative_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'administrative_control_mitigative_description' => 'required',
            'administrative_control_mitigative_value' => 'required',
            'administrative_control_mitigative_abbr' => 'required'
        ]);

        $save = Administrative_Control_Mitigative::insert([
            'administrative_control_mitigative_description' => $this->administrative_control_mitigative_description,
            'administrative_control_mitigative_value' => $this->administrative_control_mitigative_value,
            'administrative_control_mitigative_abbr' => $this->administrative_control_mitigative_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($administrative_control_mitigative_id)
    {
        $info = Administrative_Control_Mitigative::find($administrative_control_mitigative_id);

        $this->upd_administrative_control_mitigative_description = $info->administrative_control_mitigative_description;
        $this->upd_administrative_control_mitigative_value = $info->administrative_control_mitigative_value;
        $this->upd_administrative_control_mitigative_abbr = $info->administrative_control_mitigative_abbr;
        $this->cid = $info->administrative_control_mitigative_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'administrative_control_mitigative_id' => $administrative_control_mitigative_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_administrative_control_mitigative_description' => 'required',
            'upd_administrative_control_mitigative_value' => 'required',
            'upd_administrative_control_mitigative_abbr' => 'required'
        ], [

            'upd_administrative_control_mitigative_description.required' => 'Enter administrative control mitigativ Description',
            'upd_administrative_control_mitigative_value.required' => 'Enter administrative control mitigativ Description',
            'upd_administrative_control_mitigative_abbr.required' => 'administrative control mitigativ Abbrivation require'
        ]);

        $update = Administrative_Control_Mitigative::find($cid)->update([
            'administrative_control_mitigative_description' => $this->upd_administrative_control_mitigative_description,
            'administrative_control_mitigative_value' => $this->upd_administrative_control_mitigative_value,
            'administrative_control_mitigative_abbr' => $this->upd_administrative_control_mitigative_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($administrative_control_mitigative_id)
    {
        $info = Administrative_Control_Mitigative::find($administrative_control_mitigative_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->upd_administrative_control_mitigative_description . '</strong>',
            'id' => $administrative_control_mitigative_id
        ]);
    }



    public function delete($administrative_control_mitigative_id)
    {
        $del =  Administrative_Control_Mitigative::find($administrative_control_mitigative_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
