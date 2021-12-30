<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\Activity66 as Forms_66Activity66;
use Livewire\Component;
use Livewire\WithPagination;

class Activity66 extends Component
{

    use WithPagination;
    public $searchQuery;
    public $activity_description, $activity_abbr;
    public $cid;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $activitydata = Forms_66Activity66::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('activity_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('activity_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->orderBy('activity_id', 'asc')->paginate(30);


        return view('livewire.forms66.activity66',[
            'activitydata'=>$activitydata
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

        $save = Forms_66Activity66::insert([
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
        $info = Forms_66Activity66::find($activity_id);

        $this->activity_description = $info->activity_description;
        $this->activity_abbr = $info->activity_abbr;
        $this->cid = $info->activity_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'activity_id' => $activity_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'activity_description' => 'required',
            'activity_abbr' => 'required'
        ]);

        $update = Forms_66Activity66::find($cid)->update([
            'activity_description' => $this->activity_description,
            'activity_abbr' => $this->activity_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($activity_id)
    {
        $info = Forms_66Activity66::find($activity_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->activity_description . '</strong>',
            'id' => $activity_id
        ]);
    }



    public function delete($activity_id)
    {
        $del =  Forms_66Activity66::find($activity_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
