<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\consequences_control;
use Livewire\Component;

class ConsequencesControl extends Component
{
    public $searchQuery;
    public $consequences_controls_description, $consequences_controls_abbr;
    public $cid, $upd_consequences_controls_description, $upd_consequences_controls_abbr;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }
 

    public function render()
    {
        $consequencescontrol = Consequences_Control::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('consequences_controls_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('consequences_controls_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('consequences_controls_id','desc')->paginate(10);

        return view('livewire.forms01.consequences-control',[
            'consequencescontrol'=>$consequencescontrol
        ]);
    }

    public function OpenAddCountryModal(){
        $this->consequences_controls_description = '';
        $this->consequences_controls_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    // insert
    public function save(){
        $this->validate([
             'consequences_controls_description'=>'required',
             'consequences_controls_abbr'=>'required'
        ]);

        $save = Consequences_Control::insert([
              'consequences_controls_description'=>$this->consequences_controls_description,
              'consequences_controls_abbr'=>$this->consequences_controls_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($consequences_controls_id){
        $info = Consequences_Control::find($consequences_controls_id);

        $this->upd_consequences_controls_description = $info->consequences_controls_description;
        $this->upd_consequences_controls_abbr = $info->consequences_controls_abbr;
        $this->cid = $info->consequences_controls_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'consequences_controls_id'=>$consequences_controls_id
        ]);
    }


    //  update
    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_consequences_controls_description'=>'required' ,
              'upd_consequences_controls_abbr'=>'required'
        ],[

            'upd_consequences_controls_description.required'=>'Enter consequences controls Description',
            'upd_consequences_controls_abbr.required'=>'consequences controls Abbrivation require'
        ]);

        $update = Consequences_Control::find($cid)->update([
            'consequences_controls_description'=>$this->upd_consequences_controls_description,
            'consequences_controls_abbr'=>$this->upd_consequences_controls_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // delete
    public function deleteConfirm($consequences_controls_id){
        $info = Consequences_Control::find($consequences_controls_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->consequences_controls_description.'</strong>',
            'id'=>$consequences_controls_id
        ]);
    }


    // delete
    public function delete($consequences_controls_id){
        $del =  Consequences_Control::find($consequences_controls_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
