<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Risk_Probability;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RiskProbability extends Component
{
    public $searchQuery;
    public $risk_probability_description, $risk_probability_abbr,$risk_probability_value;
    public $cid, $upd_risk_probability_description, $upd_risk_probability_abbr,$upd_risk_probability_value,$userID;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';

        $this->userID = Auth::user()->id;
    }

    public function render()
    {
         # render with search query
         $riskprobability = Risk_Probability::when($this->searchQuery != '', function ($query) {
             $query->where('bactive', '1')
                 ->where('risk_probability_description', 'like', '%' . $this->searchQuery . '%')
                 ->where('risk_probability_value', 'like', '%' . $this->searchQuery . '%')
                 ->orWhere('risk_probability_abbr', 'like', '%' . $this->searchQuery . '%');
         })->orderBy('risk_probability_id', 'desc')->paginate(10);

        return view('livewire.forms01.risk-probability',[
            'riskprobability'=> $riskprobability
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->risk_probability_description = '';
        $this->risk_probability_value = '';
        $this->risk_probability_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'risk_probability_description' => 'required',
            'risk_probability_value' => 'required|numeric',
            'risk_probability_abbr' => 'required'
        ]);

        $save = Risk_Probability::insert([
            'risk_probability_description' => $this->risk_probability_description,
            'risk_probability_value' => $this->risk_probability_value,
            'risk_probability_abbr' => $this->risk_probability_abbr,

            'user_created' => $this->userID,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($risk_probability_id)
    {
        $info = Risk_Probability::find($risk_probability_id);

        $this->upd_risk_probability_description = $info->risk_probability_description;
        $this->upd_risk_probability_value = $info->risk_probability_value;
        $this->upd_risk_probability_abbr = $info->risk_probability_abbr;
        $this->cid = $info->risk_probability_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'risk_probability_id' => $risk_probability_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_risk_probability_description' => 'required',
            'upd_risk_probability_value' => 'required|numeric',
            'upd_risk_probability_abbr' => 'required'
        ], [

            'upd_risk_probability_description.required' => 'Enter risk probability Description',
            'upd_risk_probability_value.required' => 'Enter risk probability Description',
            'upd_risk_probability_abbr.required' => 'risk probability Abbrivation require'
        ]);

        $update = Risk_Probability::find($cid)->update([
            'risk_probability_description' => $this->upd_risk_probability_description,
            'risk_probability_value' => $this->upd_risk_probability_value,
            'risk_probability_abbr' => $this->upd_risk_probability_abbr,

            'user_updated' => $this->userID,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($risk_probability_id)
    {
        $info = Risk_Probability::find($risk_probability_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->risk_probability_description . '</strong>',
            'id' => $risk_probability_id
        ]);
    }



    public function delete($risk_probability_id)
    {
        $del =  Risk_Probability::find($risk_probability_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
