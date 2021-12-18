<?php

namespace App\Http\Livewire\Forms22;

use App\Models\forms_22\topic_discussed;
use Livewire\Component;

class TopicDiscusseds extends Component
{
    public $searchQuery,$role;
    public $topic_discusseds_description, $topic_discusseds_abbr;
    public $cid, $upd_topic_discusseds_description, $upd_topic_discusseds_abbr;

    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $topicdata = topic_discussed::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('topic_discusseds_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('topic_discusseds_abbr', 'like', '%' . $this->searchQuery . '%');
        })->get();

        return view('livewire.forms22.topic-discusseds',[
            'topicdata'=>$topicdata
        ]);
    }

    
     
    public function OpenAddCountryModal()
    {
        $this->topic_discusseds_description = '';
        $this->topic_discusseds_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'topic_discusseds_description' => 'required',
            'topic_discusseds_abbr' => 'required'
        ]);

        $save = topic_discussed::insert([
            'topic_discusseds_description' => $this->topic_discusseds_description,
            'topic_discusseds_abbr' => $this->topic_discusseds_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($topic_discusseds_id ,$role = 'Staff')
    {
        $info = topic_discussed::find($topic_discusseds_id);

        $this->role = $role;

        $this->upd_topic_discusseds_description = $info->topic_discusseds_description;
        $this->upd_topic_discusseds_abbr = $info->topic_discusseds_abbr;
        $this->cid = $info->topic_discusseds_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'topic_discusseds_id' => $topic_discusseds_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_topic_discusseds_description' => 'required',
            'upd_topic_discusseds_abbr' => 'required'
        ], [

            'upd_topic_discusseds_description.required' => 'Enter incident Description',
            'upd_topic_discusseds_abbr.required' => 'coworker statement Abbrivation require'
        ]);

        $update = topic_discussed::find($cid)->update([
            'topic_discusseds_description' => $this->upd_topic_discusseds_description,
            'topic_discusseds_abbr' => $this->upd_topic_discusseds_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    public function deleteConfirm($topic_discusseds_id)
    {
        $info = topic_discussed::find($topic_discusseds_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->topic_discusseds_description . '</strong>',
            'id' => $topic_discusseds_id
        ]);
    }

    public function delete($topic_discusseds_id)
    {
        $del =  topic_discussed::find($topic_discusseds_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
