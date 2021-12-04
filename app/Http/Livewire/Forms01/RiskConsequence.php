<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Risk_Consequence;
use Livewire\Component;

class RiskConsequence extends Component
{
    public $searchQuery;
    public $risk_consequence_description, $risk_consequence_abbr,$risk_consequence_value;
    public $cid, $upd_risk_consequence_description, $upd_risk_consequence_abbr,$upd_risk_consequence_value;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        # render with search query
        $riskconsequence = Risk_Consequence::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('risk_consequence_description', 'like', '%' . $this->searchQuery . '%')
                ->where('risk_consequence_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('risk_consequence_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('risk_consequence_id', 'desc')->paginate(10);

        return view('livewire.forms01.risk-consequence',[
            'riskconsequence'=>$riskconsequence
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->risk_consequence_description = '';
        $this->risk_consequence_value = '';
        $this->risk_consequence_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'risk_consequence_description' => 'required',
            'risk_consequence_value' => 'required',
            'risk_consequence_abbr' => 'required'
        ]);

        $save = Risk_Consequence::insert([
            'risk_consequence_description' => $this->risk_consequence_description,
            'risk_consequence_value' => $this->risk_consequence_value,
            'risk_consequence_abbr' => $this->risk_consequence_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($risk_consequence_id)
    {
        $info = Risk_Consequence::find($risk_consequence_id);

        $this->upd_risk_consequence_description = $info->risk_consequence_description;
        $this->upd_risk_consequence_value = $info->risk_consequence_value;
        $this->upd_risk_consequence_abbr = $info->risk_consequence_abbr;
        $this->cid = $info->risk_consequence_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'risk_consequence_id' => $risk_consequence_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_risk_consequence_description' => 'required',
            'upd_risk_consequence_value' => 'required',
            'upd_risk_consequence_abbr' => 'required'
        ], [

            'upd_risk_consequence_description.required' => 'Enter risk consequence Description',
            'upd_risk_consequence_value.required' => 'Enter risk consequence Description',
            'upd_risk_consequence_abbr.required' => 'risk consequence Abbrivation require'
        ]);

        $update = Risk_Consequence::find($cid)->update([
            'risk_consequence_description' => $this->upd_risk_consequence_description,
            'risk_consequence_value' => $this->upd_risk_consequence_value,
            'risk_consequence_abbr' => $this->upd_risk_consequence_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($risk_consequence_id)
    {
        $info = Risk_Consequence::find($risk_consequence_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->upd_risk_consequence_description . '</strong>',
            'id' => $risk_consequence_id
        ]);
    }



    public function delete($risk_consequence_id)
    {
        $del =  Risk_Consequence::find($risk_consequence_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
