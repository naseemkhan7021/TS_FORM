<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Engineering_Control;
use Livewire\Component;

class EngineeringControl extends Component
{
    public $searchQuery;
    public $engineering_control_description, $engineering_control_abbr,$engineering_control_value;
    public $cid, $upd_engineering_control_description, $upd_engineering_control_abbr,$upd_engineering_control_value;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }


    public function render()
    {
        # render with search query
        $engineeringcontrol = Engineering_Control::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('engineering_control_description', 'like', '%' . $this->searchQuery . '%')
                ->where('engineering_control_abbr', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('engineering_control_value', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('engineering_control_id', 'desc')->paginate(10);


        return view('livewire.forms01.engineering-control',[
            'engineeringcontrol'=>$engineeringcontrol
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->engineering_control_description = '';
        $this->engineering_control_value = '';
        $this->engineering_control_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'engineering_control_description' => 'required',
            'engineering_control_value' => 'required',
            'engineering_control_abbr' => 'required'
        ]);

        $save = Engineering_Control::insert([
            'engineering_control_description' => $this->engineering_control_description,
            'engineering_control_value' => $this->engineering_control_value,
            'engineering_control_abbr' => $this->engineering_control_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($engineering_control_id)
    {
        $info = Engineering_Control::find($engineering_control_id);

        $this->upd_engineering_control_description = $info->engineering_control_description;
        $this->upd_engineering_control_value = $info->engineering_control_value;
        $this->upd_engineering_control_abbr = $info->engineering_control_abbr;
        $this->cid = $info->engineering_control_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'engineering_control_id' => $engineering_control_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_engineering_control_description' => 'required',
            'upd_engineering_control_value' => 'required',
            'upd_engineering_control_abbr' => 'required'
        ], [

            'upd_engineering_control_description.required' => 'Enter engineering control Description',
            'upd_engineering_control_value.required' => 'Enter engineering control Description',
            'upd_engineering_control_abbr.required' => 'engineering control Abbrivation require'
        ]);

        $update = Engineering_Control::find($cid)->update([
            'engineering_control_description' => $this->upd_engineering_control_description,
            'engineering_control_value' => $this->upd_engineering_control_value,
            'engineering_control_abbr' => $this->upd_engineering_control_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($engineering_control_id)
    {
        $info = Engineering_Control::find($engineering_control_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->upd_engineering_control_description . '</strong>',
            'id' => $engineering_control_id
        ]);
    }



    public function delete($engineering_control_id)
    {
        $del =  Engineering_Control::find($engineering_control_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
