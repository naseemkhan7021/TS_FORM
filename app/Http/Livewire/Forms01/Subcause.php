<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Sub_cause;
use Livewire\Component;

class Subcause extends Component
{
    public $searchQuery;
    public $sub_causes_description, $sub_causes_abbr;
    public $cid, $upd_sub_causes_description, $upd_sub_causes_abbr;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        # render with search query
        $subcousesydata = Sub_cause::join('causes', 'causes.causes_id', '=', 'sub_causes.causes_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('sub_causes_description', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sub_causes_abbr', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('sub_causes_id', 'dec')->paginate(10);

        return view('livewire.forms01.subcause',[
            'subcousesydata'=>$subcousesydata,
        ]);
    }

    public function save()
    {
        # save
        $this->validate([
            'sub_causes_description' => 'required',
            'sub_causes_abbr' => 'required'
        ]);

        $save = Sub_cause::insert([
            'sub_causes_abbr' => $this->sub_causes_abbr,
            'sub_causes_description' => $this->sub_causes_description
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($sub_causes_id)
    {
        # code...
        $info = Sub_cause::find($sub_causes_id);

        $this->upd_sub_causes_description = $info->sub_causes_description;
        $this->upd_sub_causes_abbr = $info->sub_causes_abbr;
        $this->cid = $info->sub_causes_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'sub_causes_id' => $sub_causes_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_sub_causes_description' => 'required',
            'upd_sub_causes_abbr' => 'required',
        ], [
            'upd_sub_causes_description.required' => 'Enter subactivity description',
            'upd_sub_causes_abbr.required' => 'subactivity Abbrivation require',
        ]);

        $update = Sub_cause::find($cid)->update([
            'sub_causes_description' => $this->upd_sub_causes_description,
            'sub_causes_abbr' => $this->upd_sub_causes_abbr,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($sub_causes_id)
    {
        # delete
        $info = Sub_cause::find($sub_causes_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->sub_causes_description . '</string>',
            'id' => $sub_causes_id
        ]);
    }

    public function delete($sub_causes_id)
    {
        $del =  Sub_cause::find($sub_causes_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}