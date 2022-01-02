<?php

namespace App\Http\Livewire\CommonForms;

use Livewire\Component;
use App\Models\common_forms\prioritytimescale as PrioritytimescaleModel;

class Prioritytimescale extends Component
{
    protected $listeners = ['delete'];
    public $searchQuery;

    public $pt_value , $prioritytimescales_desc , $prioritytimescales_abbr;
    public $upd_pt_value , $upd_prioritytimescales_desc , $upd_prioritytimescales_abbr;

    public  function mount()
    {
        $this->searchQuery = '';

    }

    public function render()
    {
        $prioritytimescalesdata = PrioritytimescaleModel::all();

        return view('livewire.common-forms.prioritytimescale' , [
            'prioritytimescalesdata' => $prioritytimescalesdata ,
        ]);
    }


    public function OpenAddCountryModal(){
        $this->prioritytimescales_desc = '';
        $this->prioritytimescales_abbr = '';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save()
    {
        # save
        $this->validate([
            'prioritytimescales_desc' => 'required',
            'pt_value' => 'required',
        ]);

        $save = PrioritytimescaleModel::insert([
            'prioritytimescales_desc' => $this->prioritytimescales_desc,
            'prioritytimescales_abbr' => $this->prioritytimescales_abbr,
            'pt_value' => $this->pt_value,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }



    public function OpenEditCountryModal($prioritytimescales_id)
    {
        # code...
        $info = PrioritytimescaleModel::find($prioritytimescales_id);
        $this->upd_prioritytimescales_desc = $info->prioritytimescales_desc;
        $this->upd_prioritytimescales_abbr = $info->prioritytimescales_abbr;
        $this->upd_pt_value = $info->pt_value;

        $this->cid = $info->prioritytimescales_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'prioritytimescales_id' => $prioritytimescales_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_prioritytimescales_desc' => 'required',
            'upd_pt_value' => 'required',

        ], [
            'upd_prioritytimescales_desc.required' => 'Enter Potential Injury Description',
            'upd_pt_value.required' => ' Enter Potential Injury Abbrivation require',

        ]);

        $update = PrioritytimescaleModel::find($cid)->update([
            'prioritytimescales_desc' => $this->upd_prioritytimescales_desc,
            'prioritytimescales_abbr' => $this->upd_prioritytimescales_abbr,
            'pt_value' => $this->upd_pt_value,

        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($prioritytimescales_id)
    {
        # delete
        $info = PrioritytimescaleModel::find($prioritytimescales_id);
        
        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->prioritytimescales_desc . '</string>',
            'id' => $prioritytimescales_id
        ]);
    }
    
    public function delete($prioritytimescales_id)
    {
        // dd($prioritytimescales_id);
        $del =  PrioritytimescaleModel::find($prioritytimescales_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }



}
