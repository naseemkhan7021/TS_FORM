<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\activity;
use App\Models\forms_01\Sub_activity;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Subactivity extends Component
{
    public $searchQuery;
    public $sub_activity_description, $sub_activity_abbr,$activity_id_fk;
    public $cid, $upd_sub_activity_description, $upd_sub_activity_abbr,$upd_activity_id_fk,$userID;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
        $this->userID = Auth::user()->id;
    }

    public function render()
    {
        # render with search query
        $subactivitydata = Sub_activity::join('activities', 'activities.activity_id', '=', 'sub_activities.activity_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('sub_activity_description', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sub_activity_abbr', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('sub_activity_id', 'desc')->paginate(10);
        $activityData = activity::all();
        return view('livewire.forms01.subactivity', [
            'subactivitydata' => $subactivitydata,'activityData'=>$activityData
        ]);
    }

    public function OpenAddCountryModal()
    {
        $this->sub_activity_description = '';
        $this->sub_activity_abbr = '';
        $this->activity_id_fk = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');

    }

    public function save()
    {
        # save
        $this->validate([
            'sub_activity_description' => 'required',
            'sub_activity_abbr' => 'required',
            'activity_id_fk' => 'required',
        ]);

        $save = Sub_activity::insert([
            'sub_activity_abbr' => $this->sub_activity_abbr,
            'activity_id_fk' => $this->activity_id_fk,
            'sub_activity_description' => $this->sub_activity_description,

            'user_created' => $this->userID,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($sub_activity_id)
    {
        # code...
        $info = Sub_activity::find($sub_activity_id);

        $this->upd_sub_activity_description = $info->sub_activity_description;
        $this->upd_sub_activity_abbr = $info->sub_activity_abbr;
        $this->upd_activity_id_fk = $info->activity_id_fk;
        $this->cid = $info->sub_activity_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'sub_activity_id' => $sub_activity_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_sub_activity_description' => 'required',
            'upd_sub_activity_abbr' => 'required',
            'upd_activity_id_fk' => 'required',
        ], [
            'upd_sub_activity_description.required' => 'Enter subactivity description',
            'upd_sub_activity_abbr.required' => 'subactivity Abbrivation require',
        ]);

        $update = Sub_activity::find($cid)->update([
            'sub_activity_description' => $this->upd_sub_activity_description,
            'sub_activity_abbr' => $this->upd_sub_activity_abbr,
            'activity_id_fk' => $this->upd_activity_id_fk,

            'user_updated' => $this->userID,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($sub_activity_id)
    {
        # delete
        $info = Sub_activity::find($sub_activity_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->sub_activity_description . '</string>',
            'id' => $sub_activity_id
        ]);
    }

    public function delete($sub_activity_id)
    {
        $del =  Sub_activity::find($sub_activity_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
