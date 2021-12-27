<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\Activity66;
use App\Models\forms_66\SubActivity66 as Forms_66SubActivity66;
use Livewire\Component;
use Livewire\WithPagination;

class SubActivity66 extends Component
{
    use WithPagination;
    public $searchQuery;
    public $sub_activity_description, $sub_activity_abbr,$activity_id_fk;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    { 
        # render with search query
        $subactivitydata = Forms_66SubActivity66::join('activity66s', 'activity66s.activity_id', '=', 'sub_activity66s.activity_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('sub_activity_description', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sub_activity_abbr', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('sub_activity_id', 'asc')->paginate(10);
        $activityData = Activity66::all();
        return view('livewire.forms66.sub-activity66',[
            'subactivitydata'=>$subactivitydata,'activityData'=>$activityData
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
            'activity_id_fk' => 'required|not_in:0',
        ]);

        $save = Forms_66SubActivity66::insert([
            'sub_activity_abbr' => $this->sub_activity_abbr,
            'activity_id_fk' => $this->activity_id_fk,
            'sub_activity_description' => $this->sub_activity_description
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($sub_activity_id)
    {
        # code...
        $info = Forms_66SubActivity66::find($sub_activity_id);

        $this->sub_activity_description = $info->sub_activity_description;
        $this->sub_activity_abbr = $info->sub_activity_abbr;
        $this->activity_id_fk = $info->activity_id_fk;
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
            'sub_activity_description' => 'required',
            'sub_activity_abbr' => 'required',
            'activity_id_fk' => 'required|not_in:0',
        ]);

        $update = Forms_66SubActivity66::find($cid)->update([
            'sub_activity_description' => $this->sub_activity_description,
            'sub_activity_abbr' => $this->sub_activity_abbr,
            'activity_id_fk' => $this->activity_id_fk,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($sub_activity_id)
    {
        # delete
        $info = Forms_66SubActivity66::find($sub_activity_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->sub_activity_description . '</string>',
            'id' => $sub_activity_id
        ]);
    }

    public function delete($sub_activity_id)
    {
        $del =  Forms_66SubActivity66::find($sub_activity_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
