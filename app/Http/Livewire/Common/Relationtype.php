<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Relationtype as RelationtypeModel;

class Relationtype extends Component
{

    public $searchQuery;
    public $relationtype_description , $relationtype_abbr;
    public $cid , $upd_relationtype_description , $upd_relationtype_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {

        $relationtypes = RelationtypeModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('relationtype_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('relationtype_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('relationtype_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.common.relationtype', [
            'relationtypes'=>$relationtypes,
        ]);



    }


    public function OpenAddCountryModal(){
        $this->relationtype_description = '';
        $this->relationtype_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'relationtype_description'=>'required',
             'relationtype_abbr'=>'required'
        ]);

        $save = RelationtypeModel::insert([
              'relationtype_description'=>$this->relationtype_description,
              'relationtype_abbr'=>$this->relationtype_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($relationtype_id){
        $info = RelationtypeModel::find($relationtype_id);

        $this->upd_relationtype_description = $info->relationtype_description;
        $this->upd_relationtype_abbr = $info->relationtype_abbr;
        $this->cid = $info->relationtype_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'relationtype_id'=>$relationtype_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_relationtype_description'=>'required' ,
              'upd_relationtype_abbr'=>'required'
        ],[

            'upd_relationtype_description.required'=>'Enter Gender Description',
            'upd_relationtype_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = RelationtypeModel::find($cid)->update([
            'relationtype_description'=>$this->upd_relationtype_description,
            'relationtype_abbr'=>$this->upd_relationtype_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($relationtype_id){
        $info = RelationtypeModel::find($relationtype_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->relationtype_description.'</strong>',
            'id'=>$relationtype_id
        ]);
    }




    public function delete($relationtype_id){
        $del =  RelationtypeModel::find($relationtype_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }



}
