<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Administrative_Control_Preventive;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdministrativeControlPreventive extends Component
{
    public $searchQuery;
    public $administrative_control_preventive_description, $administrative_control_preventive_abbr,$administrative_control_preventive_value;
    public $cid, $upd_administrative_control_preventive_description, $upd_administrative_control_preventive_abbr,$upd_administrative_control_preventive_value,$userID;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
        $this->userID = Auth::user()->id;
    }

    public function render()
    {
        # render with search query
        $administrativecontrolpreventive = Administrative_Control_Preventive::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('administrative_control_preventive_description', 'like', '%' . $this->searchQuery . '%')
                ->where('administrative_control_preventive_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('administrative_control_preventive_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('administrative_control_preventive_id', 'desc')->paginate(10);

        return view('livewire.forms01.administrative-control-preventive',[
            'administrativecontrolpreventive'=>$administrativecontrolpreventive
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->administrative_control_preventive_description = '';
        $this->administrative_control_preventive_value = '';
        $this->administrative_control_preventive_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'administrative_control_preventive_description' => 'required',
            'administrative_control_preventive_value' => 'required|numeric',
            'administrative_control_preventive_abbr' => 'required'
        ]);

        $save = Administrative_Control_Preventive::insert([
            'administrative_control_preventive_description' => $this->administrative_control_preventive_description,
            'administrative_control_preventive_value' => $this->administrative_control_preventive_value,
            'administrative_control_preventive_abbr' => $this->administrative_control_preventive_abbr,

            'user_created' => $this->userID,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($administrative_control_preventive_id)
    {
        $info = Administrative_Control_Preventive::find($administrative_control_preventive_id);

        $this->upd_administrative_control_preventive_description = $info->administrative_control_preventive_description;
        $this->upd_administrative_control_preventive_value = $info->administrative_control_preventive_value;
        $this->upd_administrative_control_preventive_abbr = $info->administrative_control_preventive_abbr;
        $this->cid = $info->administrative_control_preventive_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'administrative_control_preventive_id' => $administrative_control_preventive_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_administrative_control_preventive_description' => 'required',
            'upd_administrative_control_preventive_value' => 'required|numeric',
            'upd_administrative_control_preventive_abbr' => 'required'
        ], [

            'upd_administrative_control_preventive_description.required' => 'Enter administrative control preventive Description',
            'upd_administrative_control_preventive_value.required' => 'Enter administrative control preventive Description',
            'upd_administrative_control_preventive_abbr.required' => 'administrative control preventive Abbrivation require'
        ]);

        $update = Administrative_Control_Preventive::find($cid)->update([
            'administrative_control_preventive_description' => $this->upd_administrative_control_preventive_description,
            'administrative_control_preventive_value' => $this->upd_administrative_control_preventive_value,
            'administrative_control_preventive_abbr' => $this->upd_administrative_control_preventive_abbr,

            'user_updated' => $this->userID,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($administrative_control_preventive_id)
    {
        $info = Administrative_Control_Preventive::find($administrative_control_preventive_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->upd_administrative_control_preventive_description . '</strong>',
            'id' => $administrative_control_preventive_id
        ]);
    }



    public function delete($administrative_control_preventive_id)
    {
        $del =  Administrative_Control_Preventive::find($administrative_control_preventive_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
