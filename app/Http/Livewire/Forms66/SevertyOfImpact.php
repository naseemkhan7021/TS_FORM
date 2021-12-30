<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\SevertyOfImpact as Forms_66SevertyOfImpact;
use Livewire\Component;
use Livewire\WithPagination;

class SevertyOfImpact extends Component
{
    use WithPagination;

    protected $listeners = ['delete'];
    public $searchQuery;
    public $severty_of_impact_description, $severty_of_impact_abbr, $severty_of_impact_value, $severty_of_impact_detail;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $severtyofimpactData = Forms_66SevertyOfImpact::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('severty_of_impact_description', 'like', '%' . $this->searchQuery . '%')
                ->where('severty_of_impact_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('severty_of_impact_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('severty_of_impact_id', 'asc')->paginate(10);

        return view('livewire.forms66.severty-of-impact',[
            'severtyofimpactData'=>$severtyofimpactData
        ]);
    }

    

    public function OpenAddCountryModal()
    {
        $this->severty_of_impact_description = '';
        $this->severty_of_impact_value = '';
        $this->severty_of_impact_abbr = '';
        $this->severty_of_impact_detail = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'severty_of_impact_description' => 'required',
            'severty_of_impact_value' => 'required',
            'severty_of_impact_detail' => 'required',
            'severty_of_impact_abbr' => 'required'
        ]);

        $save = Forms_66SevertyOfImpact::insert([
            'severty_of_impact_description' => $this->severty_of_impact_description,
            'severty_of_impact_value' => $this->severty_of_impact_value,
            'severty_of_impact_detail' => $this->severty_of_impact_detail,
            'severty_of_impact_abbr' => $this->severty_of_impact_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($severty_of_impact_id)
    {
        $info = Forms_66SevertyOfImpact::find($severty_of_impact_id);

        $this->severty_of_impact_description = $info->severty_of_impact_description;
        $this->severty_of_impact_value = $info->severty_of_impact_value;
        $this->severty_of_impact_detail = $info->severty_of_impact_detail;
        $this->severty_of_impact_abbr = $info->severty_of_impact_abbr;
        $this->cid = $info->severty_of_impact_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'severty_of_impact_id' => $severty_of_impact_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'severty_of_impact_description' => 'required',
            'severty_of_impact_value' => 'required',
            'severty_of_impact_detail' => 'required',
            'severty_of_impact_abbr' => 'required'
        ]);

        $update = Forms_66SevertyOfImpact::find($cid)->update([
            'severty_of_impact_description' => $this->severty_of_impact_description,
            'severty_of_impact_value' => $this->severty_of_impact_value,
            'severty_of_impact_detail' => $this->severty_of_impact_detail,
            'severty_of_impact_abbr' => $this->severty_of_impact_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($severty_of_impact_id)
    {
        $info = Forms_66SevertyOfImpact::find($severty_of_impact_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->severty_of_impact_description . '</strong>',
            'id' => $severty_of_impact_id
        ]);
    }



    public function delete($severty_of_impact_id)
    {
        $del =  Forms_66SevertyOfImpact::find($severty_of_impact_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
