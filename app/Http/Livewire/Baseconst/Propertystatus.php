<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use App\Models\baseconst\PropertyStatus as PropertyStatusModel;

class Propertystatus extends Component
{

    public $searchQuery;
    public $propertystatus_description , $propertystatus_abbr;
    public $cid , $upd_propertystatus_description , $upd_propertystatus_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $propertystatuses = PropertyStatusModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('propertystatus_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('propertystatus_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('propertystatus_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.baseconst.propertystatus', [
            'propertystatuses'=>$propertystatuses,
        ]);



    }


    public function OpenAddCountryModal(){
        $this->propertystatus_description = '';
        $this->propertystatus_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'propertystatus_description'=>'required',
             'propertystatus_abbr'=>'required'
        ]);

        $save = PropertyStatusModel::insert([
              'propertystatus_description'=>$this->propertystatus_description,
              'propertystatus_abbr'=>$this->propertystatus_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($propertystatus_id){
        $info = PropertyStatusModel::find($propertystatus_id);

        $this->upd_propertystatus_description = $info->propertystatus_description;
        $this->upd_propertystatus_abbr = $info->propertystatus_abbr;
        $this->cid = $info->propertystatus_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'propertystatus_id'=>$propertystatus_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_propertystatus_description'=>'required' ,
              'upd_propertystatus_abbr'=>'required'
        ],[

            'upd_propertystatus_description.required'=>'Enter Property Status Description',
            'upd_propertystatus_abbr.required'=>'Property Status Abbrivation require'
        ]);

        $update = PropertyStatusModel::find($cid)->update([
            'propertystatus_description'=>$this->upd_propertystatus_description,
            'propertystatus_abbr'=>$this->upd_propertystatus_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($propertystatus_id){
        $info = PropertyStatusModel::find($propertystatus_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->propertystatus_description.'</strong>',
            'id'=>$propertystatus_id
        ]);
    }




    public function delete($propertystatus_id){
        $del =  PropertyStatusModel::find($propertystatus_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }





}
