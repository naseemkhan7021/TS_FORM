<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\EnvironmentalImpact as Forms_66EnvironmentalImpact;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class EnvironmentalImpact extends Component
{ 
    use WithPagination;
    protected $listeners = ['delete'];
    public $searchQuery;
    public $environmental_impact_description, $environmental_impact_abbr, $environmental_impact_value, $environmental_impact_detail;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
        // Carbon::parse()->format()
    }

    public function render()
    {
        $environmentailimpactData = Forms_66EnvironmentalImpact::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('environmental_impact_description', 'like', '%' . $this->searchQuery . '%')
                ->where('environmental_impact_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('environmental_impact_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('environmental_impact_id', 'asc')->paginate(10);

        return view('livewire.forms66.environmental-impact', [
            'environmentailimpactData' => $environmentailimpactData
        ]);
    }



    public function OpenAddCountryModal()
    {
        $this->environmental_impact_description = '';
        $this->environmental_impact_value = '';
        $this->environmental_impact_abbr = '';
        $this->environmental_impact_detail = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'environmental_impact_description' => 'required',
            'environmental_impact_value' => 'required|numeric',
            'environmental_impact_detail' => 'required',
            'environmental_impact_abbr' => 'required'
        ]);

        $save = Forms_66EnvironmentalImpact::insert([
            'environmental_impact_description' => $this->environmental_impact_description,
            'environmental_impact_value' => $this->environmental_impact_value,
            'environmental_impact_detail' => $this->environmental_impact_detail,
            'environmental_impact_abbr' => $this->environmental_impact_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($environmental_impact_id)
    {
        $info = Forms_66EnvironmentalImpact::find($environmental_impact_id);

        $this->environmental_impact_description = $info->environmental_impact_description;
        $this->environmental_impact_value = $info->environmental_impact_value;
        $this->environmental_impact_detail = $info->environmental_impact_detail;
        $this->environmental_impact_abbr = $info->environmental_impact_abbr;
        $this->cid = $info->environmental_impact_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'environmental_impact_id' => $environmental_impact_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'environmental_impact_description' => 'required',
            'environmental_impact_value' => 'required|numeric',
            'environmental_impact_detail' => 'required',
            'environmental_impact_abbr' => 'required'
        ]);

        $update = Forms_66EnvironmentalImpact::find($cid)->update([
            'environmental_impact_description' => $this->environmental_impact_description,
            'environmental_impact_value' => $this->environmental_impact_value,
            'environmental_impact_detail' => $this->environmental_impact_detail,
            'environmental_impact_abbr' => $this->environmental_impact_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($environmental_impact_id)
    {
        $info = Forms_66EnvironmentalImpact::find($environmental_impact_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->environmental_impact_description . '</strong>',
            'id' => $environmental_impact_id
        ]);
    }



    public function delete($environmental_impact_id)
    {
        $del =  Forms_66EnvironmentalImpact::find($environmental_impact_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
