<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Addresstype as AddresstypeModel;

class Addresstype extends Component
{

    public $searchQuery;

    public $addresstype_description , $addresstype_abbr;
    public $cid , $upd_addresstype_description , $upd_addresstype_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

    $addresstypes = AddresstypeModel::when($this->searchQuery != '', function($query) {
        $query->where('bactive','1')
        ->where('addresstype_description' , 'like' , '%'.$this->searchQuery.'%')
        ->orWhere('addresstype_abbr' , 'like' , '%'.$this->searchQuery.'%');
    })
    ->orderBy('addresstype_id','desc')->paginate(10);

    return view('livewire.common.addresstype', [
        'addresstypes'=>$addresstypes,
    ]);


    }


    public function OpenAddCountryModal(){
        $this->addresstype_description = '';
        $this->addresstype_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'addresstype_description'=>'required',
             'addresstype_abbr'=>'required'
        ]);

        $save = AddresstypeModel::insert([
              'addresstype_description'=>$this->addresstype_description,
              'addresstype_abbr'=>$this->addresstype_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($addresstype_id){
        $info = AddresstypeModel::find($addresstype_id);

        $this->upd_addresstype_description = $info->addresstype_description;
        $this->upd_addresstype_abbr = $info->addresstype_abbr;
        $this->cid = $info->addresstype_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'addresstype_id'=>$addresstype_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_addresstype_description'=>'required' ,
              'upd_addresstype_abbr'=>'required'
        ],[

            'upd_addresstype_description.required'=>'Enter Address Type Description',
            'upd_addresstype_abbr.required'=>'Address Type Abbrivation require'
        ]);

        $update = AddresstypeModel::find($cid)->update([
            'addresstype_description'=>$this->upd_addresstype_description,
            'addresstype_abbr'=>$this->upd_addresstype_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }




    public function deleteConfirm($addresstype_id){
        $info = AddresstypeModel::find($addresstype_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->addresstype_description.'</strong>',
            'id'=>$addresstype_id
        ]);
    }



    public function delete($addresstype_id){
        $del =  AddresstypeModel::find($addresstype_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }






}
