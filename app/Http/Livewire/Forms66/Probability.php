<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\Probability as Forms_66Probability;
use Livewire\Component;
use Livewire\WithPagination;

class Probability extends Component
{
    use WithPagination;

    protected $listeners = ['delete'];
    public $searchQuery;
    public $probability_description, $probability_abbr, $probability_value, $probability_detail;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $probabilityData = Forms_66Probability::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('probability_description', 'like', '%' . $this->searchQuery . '%')
                ->where('probability_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('probability_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('probability_id', 'asc')->paginate(10);

        return view('livewire.forms66.probability', [
            'probabilityData' => $probabilityData
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->probability_description = '';
        $this->probability_value = '';
        $this->probability_abbr = '';
        $this->probability_detail = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'probability_description' => 'required',
            'probability_value' => 'required|numeric',
            'probability_detail' => 'required',
            'probability_abbr' => 'required'
        ]);

        $save = Forms_66Probability::insert([
            'probability_description' => $this->probability_description,
            'probability_value' => $this->probability_value,
            'probability_detail' => $this->probability_detail,
            'probability_abbr' => $this->probability_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($probability_id)
    {
        $info = Forms_66Probability::find($probability_id);

        $this->probability_description = $info->probability_description;
        $this->probability_value = $info->probability_value;
        $this->probability_detail = $info->probability_detail;
        $this->probability_abbr = $info->probability_abbr;
        $this->cid = $info->probability_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'probability_id' => $probability_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'probability_description' => 'required',
            'probability_value' => 'required|numeric',
            'probability_detail' => 'required',
            'probability_abbr' => 'required'
        ]);

        $update = Forms_66Probability::find($cid)->update([
            'probability_description' => $this->probability_description,
            'probability_value' => $this->probability_value,
            'probability_detail' => $this->probability_detail,
            'probability_abbr' => $this->probability_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($probability_id)
    {
        $info = Forms_66Probability::find($probability_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->probability_description . '</strong>',
            'id' => $probability_id
        ]);
    }



    public function delete($probability_id)
    {
        $del =  Forms_66Probability::find($probability_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
