<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\ScaleOfImpact as Forms_66ScaleOfImpact;
use Livewire\Component;
use Livewire\WithPagination;

class ScaleOfImpact extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete'];
    public $searchQuery;
    public $scale_of_impact_description, $scale_of_impact_abbr, $scale_of_impact_value, $scale_of_impact_detail;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $scaleofimpactData = Forms_66ScaleOfImpact::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('scale_of_impact_description', 'like', '%' . $this->searchQuery . '%')
                ->where('scale_of_impact_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('scale_of_impact_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('scale_of_impact_id', 'asc')->paginate(10);

        return view('livewire.forms66.scale-of-impact', [
            'scaleofimpactData' => $scaleofimpactData
        ]);
    }


    public function OpenAddCountryModal()
    {
        $this->scale_of_impact_description = '';
        $this->scale_of_impact_value = '';
        $this->scale_of_impact_abbr = '';
        $this->scale_of_impact_detail = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'scale_of_impact_description' => 'required',
            'scale_of_impact_value' => 'required|numeric',
            'scale_of_impact_detail' => 'required',
            'scale_of_impact_abbr' => 'required'
        ]);

        $save = Forms_66ScaleOfImpact::insert([
            'scale_of_impact_description' => $this->scale_of_impact_description,
            'scale_of_impact_value' => $this->scale_of_impact_value,
            'scale_of_impact_detail' => $this->scale_of_impact_detail,
            'scale_of_impact_abbr' => $this->scale_of_impact_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($scale_of_impact_id)
    {
        $info = Forms_66ScaleOfImpact::find($scale_of_impact_id);

        $this->scale_of_impact_description = $info->scale_of_impact_description;
        $this->scale_of_impact_value = $info->scale_of_impact_value;
        $this->scale_of_impact_detail = $info->scale_of_impact_detail;
        $this->scale_of_impact_abbr = $info->scale_of_impact_abbr;
        $this->cid = $info->scale_of_impact_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'scale_of_impact_id' => $scale_of_impact_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'scale_of_impact_description' => 'required',
            'scale_of_impact_value' => 'required|numeric',
            'scale_of_impact_detail' => 'required',
            'scale_of_impact_abbr' => 'required'
        ]);

        $update = Forms_66ScaleOfImpact::find($cid)->update([
            'scale_of_impact_description' => $this->scale_of_impact_description,
            'scale_of_impact_value' => $this->scale_of_impact_value,
            'scale_of_impact_detail' => $this->scale_of_impact_detail,
            'scale_of_impact_abbr' => $this->scale_of_impact_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($scale_of_impact_id)
    {
        $info = Forms_66ScaleOfImpact::find($scale_of_impact_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->scale_of_impact_description . '</strong>',
            'id' => $scale_of_impact_id
        ]);
    }



    public function delete($scale_of_impact_id)
    {
        $del =  Forms_66ScaleOfImpact::find($scale_of_impact_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
