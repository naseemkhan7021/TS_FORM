<?php

namespace App\Http\Livewire\Forms35;

use App\Models\forms_35\form35_checkpoint;
use Livewire\Component;
use Livewire\WithPagination;

class Checkpoint extends Component
{

    use WithPagination;
    protected $listeners = ['delete'];
    public $searchQuery;
    public $form35_checkpoints_desc, $form35_checkpoints_abbr;
    public $cid;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {

        $checkpointsData = form35_checkpoint::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('form35_checkpoints_desc', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('form35_checkpoints_abbr', 'like', '%' . $this->searchQuery . '%');
        })
            ->orderBy('form35_checkpoints_id', 'asc')->paginate(30);

        return view('livewire.forms35.checkpoint',[
            'checkpointsData'=>$checkpointsData,
        ]);
    }


    public function OpenAddCountryModal()
    {
        $this->form35_checkpoints_desc = '';
        $this->form35_checkpoints_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'form35_checkpoints_desc' => 'required',
            'form35_checkpoints_abbr' => 'required'
        ]);

        $save = form35_checkpoint::insert([
            'form35_checkpoints_desc' => $this->form35_checkpoints_desc,
            'form35_checkpoints_abbr' => $this->form35_checkpoints_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($form35_checkpoints_id)
    {
        $info = form35_checkpoint::find($form35_checkpoints_id);
        $this->form35_checkpoints_desc = $info->form35_checkpoints_desc;
        $this->form35_checkpoints_abbr = $info->form35_checkpoints_abbr;
        $this->cid = $info->form35_checkpoints_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'form35_checkpoints_id' => $form35_checkpoints_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'form35_checkpoints_desc' => 'required',
            'form35_checkpoints_abbr' => 'required'
        ]);

        $update = form35_checkpoint::find($cid)->update([
            'form35_checkpoints_desc' => $this->form35_checkpoints_desc,
            'form35_checkpoints_abbr' => $this->form35_checkpoints_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    public function deleteConfirm($form35_checkpoints_id)
    {
        $info = form35_checkpoint::find($form35_checkpoints_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->form35_checkpoints_desc . '</strong>',
            'id' => $form35_checkpoints_id
        ]);
    }



    public function delete($form35_checkpoints_id)
    {
        $del =  form35_checkpoint::find($form35_checkpoints_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
