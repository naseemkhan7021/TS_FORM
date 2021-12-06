<?php

namespace App\Http\Livewire\Forms15;

use App\Models\Form15\Activity15 as Form15Activity15;
use Livewire\Component;

class Activity15 extends Component
{

    public $searchQuery;
    public $activity15s_description, $activity_abbr;
    public $cid, $upd_activity15s_description, $upd_activity_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {

        $activity15data = Form15Activity15::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('activity15s_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('activity_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->orderBy('activity15s_id', 'desc')->paginate(10);

        return view('livewire.forms15.activity15',[
            'activity15data'=>$activity15data
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->activity15s_description = '';
        $this->activity_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'activity15s_description' => 'required',
            'activity_abbr' => 'required'
        ]);

        $save = Form15Activity15::insert([
            'activity15s_description' => $this->activity15s_description,
            'activity_abbr' => $this->activity_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($activity15s_id)
    {
        $info = Form15Activity15::find($activity15s_id);

        $this->upd_activity15s_description = $info->activity15s_description;
        $this->upd_activity_abbr = $info->activity_abbr;
        $this->cid = $info->activity15s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'activity15s_id' => $activity15s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_activity15s_description' => 'required',
            'upd_activity_abbr' => 'required'
        ], [

            'upd_activity15s_description.required' => 'Enter Activity Description',
            'upd_activity_abbr.required' => 'Activity Abbrivation require'
        ]);

        $update = Form15Activity15::find($cid)->update([
            'activity15s_description' => $this->upd_activity15s_description,
            'activity_abbr' => $this->upd_activity_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($activity15s_id)
    {
        $info = Form15Activity15::find($activity15s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->activity15s_description . '</strong>',
            'id' => $activity15s_id
        ]);
    }



    public function delete($activity15s_id)
    {
        $del =  Form15Activity15::find($activity15s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
