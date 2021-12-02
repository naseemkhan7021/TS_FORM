<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Religion as ReligionModel;

class Religion extends Component
{

    public $searchQuery;
    public $religion_description , $religion_abbr;
    public $cid , $upd_religion_description , $upd_religion_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $religions = ReligionModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('religion_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('religion_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('religion_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.common.religion', [
            'religions'=>$religions,
        ]);


    }


    public function OpenAddCountryModal(){
        $this->religion_description = '';
        $this->religion_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'religion_description'=>'required',
             'religion_abbr'=>'required'
        ]);

        $save = ReligionModel::insert([
              'religion_description'=>$this->religion_description,
              'religion_abbr'=>$this->religion_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($religion_id){
        $info = ReligionModel::find($religion_id);

        $this->upd_religion_description = $info->religion_description;
        $this->upd_religion_abbr = $info->religion_abbr;
        $this->cid = $info->religion_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'religion_id'=>$religion_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_religion_description'=>'required' ,
              'upd_religion_abbr'=>'required'
        ],[

            'upd_religion_description.required'=>'Enter Gender Description',
            'upd_religion_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = ReligionModel::find($cid)->update([
            'religion_description'=>$this->upd_religion_description,
            'religion_abbr'=>$this->upd_religion_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($religion_id){
        $info = ReligionModel::find($religion_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->religion_description.'</strong>',
            'id'=>$religion_id
        ]);
    }




    public function delete($religion_id){
        $del =  ReligionModel::find($religion_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
