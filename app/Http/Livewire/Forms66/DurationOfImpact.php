<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\DurationOfImpact as Forms_66DurationOfImpact;
use Livewire\Component;
use Livewire\WithPagination;

class DurationOfImpact extends Component
{
    use WithPagination;

    protected $listeners = ['delete'];
    public $searchQuery;
    public $duration_of_impact_description, $duration_of_impact_abbr, $duration_of_impact_value, $duration_of_impact_detail;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $durationimpacatData = Forms_66DurationOfImpact::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('duration_of_impact_description', 'like', '%' . $this->searchQuery . '%')
                ->where('duration_of_impact_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('duration_of_impact_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('duration_of_impact_id', 'asc')->paginate(10);

        return view('livewire.forms66.duration-of-impact', [
            'durationimpacatData' => $durationimpacatData
        ]);
    }


    public function OpenAddCountryModal()
    {
        $this->duration_of_impact_description = '';
        $this->duration_of_impact_value = '';
        $this->duration_of_impact_abbr = '';
        $this->duration_of_impact_detail = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'duration_of_impact_description' => 'required',
            'duration_of_impact_value' => 'required',
            'duration_of_impact_detail' => 'required',
            'duration_of_impact_abbr' => 'required'
        ]);

        $save = Forms_66DurationOfImpact::insert([
            'duration_of_impact_description' => $this->duration_of_impact_description,
            'duration_of_impact_value' => $this->duration_of_impact_value,
            'duration_of_impact_detail' => $this->duration_of_impact_detail,
            'duration_of_impact_abbr' => $this->duration_of_impact_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($duration_of_impact_id)
    {
        $info = Forms_66DurationOfImpact::find($duration_of_impact_id);

        $this->duration_of_impact_description = $info->duration_of_impact_description;
        $this->duration_of_impact_value = $info->duration_of_impact_value;
        $this->duration_of_impact_detail = $info->duration_of_impact_detail;
        $this->duration_of_impact_abbr = $info->duration_of_impact_abbr;
        $this->cid = $info->duration_of_impact_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'duration_of_impact_id' => $duration_of_impact_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'duration_of_impact_description' => 'required',
            'duration_of_impact_value' => 'required',
            'duration_of_impact_detail' => 'required',
            'duration_of_impact_abbr' => 'required'
        ]);

        $update = Forms_66DurationOfImpact::find($cid)->update([
            'duration_of_impact_description' => $this->duration_of_impact_description,
            'duration_of_impact_value' => $this->duration_of_impact_value,
            'duration_of_impact_detail' => $this->duration_of_impact_detail,
            'duration_of_impact_abbr' => $this->duration_of_impact_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($duration_of_impact_id)
    {
        $info = Forms_66DurationOfImpact::find($duration_of_impact_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->duration_of_impact_description . '</strong>',
            'id' => $duration_of_impact_id
        ]);
    }



    public function delete($duration_of_impact_id)
    {
        $del =  Forms_66DurationOfImpact::find($duration_of_impact_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
