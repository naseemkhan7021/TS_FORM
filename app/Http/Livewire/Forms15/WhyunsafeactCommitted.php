<?php

namespace App\Http\Livewire\Forms15;

use App\Models\forms_15\WhyunsafeactCommitted as Forms_15WhyunsafeactCommitted;
use Livewire\Component;

class WhyunsafeactCommitted extends Component
{
      
    public $searchQuery;
    public $whyunsafeact_committeds_description, $whyunsafeact_committeds_abbr;
    public $cid, $upd_whyunsafeact_committeds_description, $upd_whyunsafeact_committeds_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {

             
        $whyunsafeactcommitteddata = Forms_15WhyunsafeactCommitted::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('whyunsafeact_committeds_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('whyunsafeact_committeds_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->get();


        return view('livewire.forms15.whyunsafeact-committed',[
            'whyunsafeactcommitteddata'=>$whyunsafeactcommitteddata
        ]);
    }

     
    public function OpenAddCountryModal()
    {
        $this->whyunsafeact_committeds_description = '';
        $this->whyunsafeact_committeds_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'whyunsafeact_committeds_description' => 'required',
            'whyunsafeact_committeds_abbr' => 'required'
        ]);

        $save = Forms_15WhyunsafeactCommitted::insert([
            'whyunsafeact_committeds_description' => $this->whyunsafeact_committeds_description,
            'whyunsafeact_committeds_abbr' => $this->whyunsafeact_committeds_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($whyunsafeact_committeds_id)
    {
        $info = Forms_15WhyunsafeactCommitted::find($whyunsafeact_committeds_id);

        $this->upd_whyunsafeact_committeds_description = $info->whyunsafeact_committeds_description;
        $this->upd_whyunsafeact_committeds_abbr = $info->whyunsafeact_committeds_abbr;
        $this->cid = $info->whyunsafeact_committeds_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'whyunsafeact_committeds_id' => $whyunsafeact_committeds_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_whyunsafeact_committeds_description' => 'required',
            'upd_whyunsafeact_committeds_abbr' => 'required'
        ], [

            'upd_whyunsafeact_committeds_description.required' => 'Enter Nature Of Potential Injuries Description',
            'upd_whyunsafeact_committeds_abbr.required' => 'Nature Of Potential Injuries Abbrivation require'
        ]);

        $update = Forms_15WhyunsafeactCommitted::find($cid)->update([
            'whyunsafeact_committeds_description' => $this->upd_whyunsafeact_committeds_description,
            'whyunsafeact_committeds_abbr' => $this->upd_whyunsafeact_committeds_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($whyunsafeact_committeds_id)
    {
        $info = Forms_15WhyunsafeactCommitted::find($whyunsafeact_committeds_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->whyunsafeact_committeds_description . '</strong>',
            'id' => $whyunsafeact_committeds_id
        ]);
        
    }
    
    
    
    public function deleteItem($whyunsafeact_committeds_id)
    {
        echo 'confirm =>';
        $del =  Forms_15WhyunsafeactCommitted::find($whyunsafeact_committeds_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
