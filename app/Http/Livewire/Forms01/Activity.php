<?php

namespace App\Http\Livewire\Forms01;

use Livewire\Component;
use App\Models\forms_01\Activity as ActivityModel;

class Activity extends Component
{

    public $searchQuery;
    public $activity_description, $activity_abbr;
    public $cid, $upd_activity_description, $upd_activity_abbr;


    public function mount()
    {
        $this->searchQuery = '';
    }



    public function render()
    {

        $activitydata = ActivityModel::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('activity_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('activity_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->orderBy('activity_id', 'desc')->paginate(10);


        return view('livewire.forms01.activity', [
            'activitydata' => $activitydata,
        ]);
    }


    public function OpenAddCountryModal()
    {
        $this->activity_description = '';
        $this->activity_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'activity_description' => 'required',
            'activity_abbr' => 'required'
        ]);

        $save = ActivityModel::insert([
            'activity_description' => $this->activity_description,
            'activity_abbr' => $this->activity_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($activity_id)
    {
        $info = ActivityModel::find($activity_id);

        $this->upd_activity_description = $info->activity_description;
        $this->upd_activity_abbr = $info->activity_abbr;
        $this->cid = $info->activity_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'activity_id' => $activity_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_activity_description' => 'required',
            'upd_activity_abbr' => 'required'
        ], [

            'upd_activity_description.required' => 'Enter Activity Description',
            'upd_activity_abbr.required' => 'Activity Abbrivation require'
        ]);

        $update = ActivityModel::find($cid)->update([
            'activity_description' => $this->upd_activity_description,
            'activity_abbr' => $this->upd_activity_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($activity_id)
    {
        $info = ActivityModel::find($activity_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->activity_description . '</strong>',
            'id' => $activity_id
        ]);
    }



    public function delete($activity_id)
    {
        $del =  ActivityModel::find($activity_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
