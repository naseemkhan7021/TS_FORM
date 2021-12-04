<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Duration_Of_Exposure;
use Livewire\Component;

class DurationOfExposure extends Component
{
    public $searchQuery;
    public $duration_of_exposure_value, $duration_of_exposure_description,$duration_of_exposure_abbr;
    public $cid, $upd_duration_of_exposure_value, $upd_duration_of_exposure_description,$upd_duration_of_exposure_abbr;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }



    public function render()
    {
        # render with search query
        $durationofexposure = Duration_Of_Exposure::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('duration_of_exposure_value', 'like', '%' . $this->searchQuery . '%')
                ->where('duration_of_exposure_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('duration_of_exposure_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('duration_of_exposure_id', 'desc')->paginate(10);


        return view('livewire.forms01.duration-of-exposure',[
            'durationofexposure'=>$durationofexposure
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->duration_of_exposure_value = '';
        $this->duration_of_exposure_abbr = '';
        $this->duration_of_exposure_description = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'duration_of_exposure_value' => 'required',
            'duration_of_exposure_abbr' => 'required',
            'duration_of_exposure_description' => 'required'
        ]);

        $save = Duration_Of_Exposure::insert([
            'duration_of_exposure_value' => $this->duration_of_exposure_value,
            'duration_of_exposure_abbr' => $this->duration_of_exposure_abbr,
            'duration_of_exposure_description' => $this->duration_of_exposure_description,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($duration_of_exposure_id)
    {
        $info = Duration_Of_Exposure::find($duration_of_exposure_id);

        $this->upd_duration_of_exposure_value = $info->duration_of_exposure_value;
        $this->upd_duration_of_exposure_abbr = $info->duration_of_exposure_abbr;
        $this->upd_duration_of_exposure_description = $info->duration_of_exposure_description;
        $this->cid = $info->duration_of_exposure_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'duration_of_exposure_id' => $duration_of_exposure_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_duration_of_exposure_value' => 'required',
            'upd_duration_of_exposure_abbr' => 'required',
            'upd_duration_of_exposure_description' => 'required'
        ], [

            'upd_duration_of_exposure_value.required' => 'Enter duration of exposure Description',
            'upd_duration_of_exposure_abbr.required' => 'Enter duration of exposure Description',
            'upd_duration_of_exposure_description.required' => 'duration of exposure Abbrivation require'
        ]);

        $update = Duration_Of_Exposure::find($cid)->update([
            'duration_of_exposure_value' => $this->upd_duration_of_exposure_value,
            'duration_of_exposure_abbr' => $this->upd_duration_of_exposure_abbr,
            'duration_of_exposure_description' => $this->upd_duration_of_exposure_description
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($duration_of_exposure_id)
    {
        $info = Duration_Of_Exposure::find($duration_of_exposure_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->duration_of_exposure_description . '</strong>',
            'id' => $duration_of_exposure_id
        ]);
    }



    public function delete($duration_of_exposure_id)
    {
        $del =  Duration_Of_Exposure::find($duration_of_exposure_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
