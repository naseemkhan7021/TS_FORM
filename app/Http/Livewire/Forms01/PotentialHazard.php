<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Potential_Hazard;
use Livewire\Component;

class PotentialHazard extends Component
{

    public $searchQuery;
    public $potential_hazard_description, $potential_hazard_abbr;
    public $cid, $upd_potential_hazard_description, $upd_potential_hazard_abbr;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }
 
    public function render()
    {
        $potentialhazard = Potential_Hazard::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('potential_hazard_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('potential_hazard_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('potential_hazard_id','desc')->paginate(10);

        return view('livewire.forms01.potential-hazard',[
            'potentialhazard'=>$potentialhazard
        ]);
    }

    public function OpenAddCountryModal(){
        $this->potential_hazard_description = '';
        $this->potential_hazard_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    // insert
    public function save(){
        $this->validate([
             'potential_hazard_description'=>'required',
             'potential_hazard_abbr'=>'required'
        ]);

        $save = Potential_Hazard::insert([
              'potential_hazard_description'=>$this->potential_hazard_description,
              'potential_hazard_abbr'=>$this->potential_hazard_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($potential_hazard_id){
        $info = Potential_Hazard::find($potential_hazard_id);

        $this->upd_potential_hazard_description = $info->potential_hazard_description;
        $this->upd_potential_hazard_abbr = $info->potential_hazard_abbr;
        $this->cid = $info->potential_hazard_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'potential_hazard_id'=>$potential_hazard_id
        ]);
    }


    //  update
    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_potential_hazard_description'=>'required' ,
              'upd_potential_hazard_abbr'=>'required'
        ],[

            'upd_potential_hazard_description.required'=>'Enter potential hazard Description',
            'upd_potential_hazard_abbr.required'=>'potential hazard Abbrivation require'
        ]);

        $update = Potential_Hazard::find($cid)->update([
            'potential_hazard_description'=>$this->upd_potential_hazard_description,
            'potential_hazard_abbr'=>$this->upd_potential_hazard_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // delete
    public function deleteConfirm($potential_hazard_id){
        $info = Potential_Hazard::find($potential_hazard_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->potential_hazard_description.'</strong>',
            'id'=>$potential_hazard_id
        ]);
    }


    // delete
    public function delete($potential_hazard_id){
        $del =  Potential_Hazard::find($potential_hazard_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
