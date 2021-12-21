<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\PotentialInjuryto;
use Livewire\Component;

class InjuryTo extends Component
{


    public $potential_injurytos_description , $potential_injurytos_abbr , $potential_injurytos_id;
    public $upd_potential_injurytos_description , $upd_potential_injurytos_abbr;



    public function render()
    {
        $potentialinurydata  = PotentialInjuryto::all();

        return view('livewire.common-forms.injury-to', [
            'potentialinurydata' => $potentialinurydata ,
        ]);
    }

    public function OpenAddCountryModal(){
        $this->potential_injurytos_description = '';
        $this->potential_injurytos_abbr = '';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save()
    {
        # save
        $this->validate([
            'potential_injurytos_description' => 'required',
            'potential_injurytos_abbr' => 'required',
        ]);

        $save = PotentialInjuryto::insert([
            'potential_injurytos_description' => $this->potential_injurytos_description,
            'potential_injurytos_abbr' => $this->potential_injurytos_abbr,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }



    public function OpenEditCountryModal($potential_injurytos_id)
    {
        # code...
        $info = PotentialInjuryto::find($potential_injurytos_id);
        $this->upd_potential_injurytos_description = $info->potential_injurytos_description;
        $this->upd_potential_injurytos_abbr = $info->potential_injurytos_abbr;

        $this->cid = $info->potential_injurytos_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'potential_injurytos_id' => $potential_injurytos_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_potential_injurytos_description' => 'required',
            'upd_potential_injurytos_abbr' => 'required',

        ], [
            'upd_potential_injurytos_description.required' => 'Enter Potential Injury Description',
            'upd_potential_injurytos_abbr.required' => ' Enter Potential Injury Abbrivation require',

        ]);

        $update = PotentialInjuryto::find($cid)->update([
            'potential_injurytos_description' => $this->upd_potential_injurytos_description,
            'potential_injurytos_abbr' => $this->upd_potential_injurytos_abbr,

        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($potential_injurytos_id)
    {
        # delete
        $info = PotentialInjuryto::find($potential_injurytos_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->potential_injurytos_description . '</string>',
            'iproject_id' => $potential_injurytos_id
        ]);
    }

    public function delete($potential_injurytos_id)
    {
        $del =  PotentialInjuryto::find($potential_injurytos_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
