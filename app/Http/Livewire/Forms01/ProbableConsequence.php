<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Probable_Consequence;
use Livewire\Component;

class ProbableConsequence extends Component
{
    public $searchQuery;
    public $probable_consequence_description, $probable_consequence_abbr;
    public $cid, $upd_probable_consequence_description, $upd_probable_consequence_abbr;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $probableconsequence = Probable_Consequence::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('probable_consequence_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('probable_consequence_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('probable_consequence_id','desc')->paginate(10);

        return view('livewire.forms01.probable-consequence',[
            'probableconsequence'=>$probableconsequence
        ]);
    }

    public function OpenAddCountryModal(){
        $this->probable_consequence_description = '';
        $this->probable_consequence_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    // insert
    public function save(){
        $this->validate([
             'probable_consequence_description'=>'required',
             'probable_consequence_abbr'=>'required'
        ]);

        $save = Probable_Consequence::insert([
              'probable_consequence_description'=>$this->probable_consequence_description,
              'probable_consequence_abbr'=>$this->probable_consequence_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($probable_consequence_id){
        $info = Probable_Consequence::find($probable_consequence_id);

        $this->upd_probable_consequence_description = $info->probable_consequence_description;
        $this->upd_probable_consequence_abbr = $info->probable_consequence_abbr;
        $this->cid = $info->probable_consequence_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'probable_consequence_id'=>$probable_consequence_id
        ]);
    }


    //  update
    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_probable_consequence_description'=>'required' ,
              'upd_probable_consequence_abbr'=>'required'
        ],[

            'upd_probable_consequence_description.required'=>'Enter consequence Description',
            'upd_probable_consequence_abbr.required'=>'consequence Abbrivation require'
        ]);

        $update = Probable_Consequence::find($cid)->update([
            'probable_consequence_description'=>$this->upd_probable_consequence_description,
            'probable_consequence_abbr'=>$this->upd_probable_consequence_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($probable_consequence_id){
        $info = Probable_Consequence::find($probable_consequence_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->probable_consequence_description.'</strong>',
            'id'=>$probable_consequence_id
        ]);
    }



    public function delete($probable_consequence_id){
        $del =  Probable_Consequence::find($probable_consequence_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

}
