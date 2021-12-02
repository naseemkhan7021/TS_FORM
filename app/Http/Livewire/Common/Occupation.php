<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Occupations as OccupationModel;

class Occupation extends Component
{

    public $searchQuery;
    public $occupation_description , $occupation_abbr;
    public $cid , $upd_occupation_description , $upd_occupation_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $occupations = OccupationModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('occupation_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('occupation_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('occupation_id','desc')->paginate(10);

        return view('livewire.common.occupation', [
            'occupations'=>$occupations,
        ]);



    }



    public function OpenAddCountryModal(){
        $this->occupation_description = '';
        $this->occupation_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'occupation_description'=>'required',
             'occupation_abbr'=>'required'
        ]);

        $save = OccupationModel::insert([
              'occupation_description'=>$this->occupation_description,
              'occupation_abbr'=>$this->occupation_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($occupation_id){
        $info = OccupationModel::find($occupation_id);

        $this->upd_occupation_description = $info->occupation_description;
        $this->upd_occupation_abbr = $info->occupation_abbr;
        $this->cid = $info->occupation_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'occupation_id'=>$occupation_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_occupation_description'=>'required' ,
              'upd_occupation_abbr'=>'required'
        ],[

            'upd_occupation_description.required'=>'Enter Occupation Description',
            'upd_occupation_abbr.required'=>'Occupation Abbrivation require'
        ]);

        $update = OccupationModel::find($cid)->update([
            'occupation_description'=>$this->upd_occupation_description,
            'occupation_abbr'=>$this->upd_occupation_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($occupation_id){
        $info = OccupationModel::find($occupation_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->occupation_description.'</strong>',
            'id'=>$occupation_id
        ]);
    }




    public function delete($occupation_id){
        $del =  OccupationModel::find($occupation_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }


}
