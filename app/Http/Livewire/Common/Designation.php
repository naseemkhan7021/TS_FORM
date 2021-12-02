<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Designation as DesignationModel;

class Designation extends Component
{

    public $searchQuery;
    public $designation_description , $designation_abbr;
    public $cid , $upd_designation_description , $upd_designation_abbr ;

    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {
        $designations = DesignationModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('designation_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('designation_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('designation_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.common.designation', [
            'designations'=>$designations,
        ]);


    }


    public function OpenAddCountryModal(){
        $this->designation_description = '';
        $this->designation_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'designation_description'=>'required',
             'designation_abbr'=>'required'
        ]);

        $save = DesignationModel::insert([
              'designation_description'=>$this->designation_description,
              'designation_abbr'=>$this->designation_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($designation_id){
        $info = DesignationModel::find($designation_id);

        $this->upd_designation_description = $info->designation_description;
        $this->upd_designation_abbr = $info->designation_abbr;
        $this->cid = $info->designation_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'designation_id'=>$designation_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_designation_description'=>'required' ,
              'upd_designation_abbr'=>'required'
        ],[

            'upd_designation_description.required'=>'Enter Gender Description',
            'upd_designation_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = DesignationModel::find($cid)->update([
            'designation_description'=>$this->upd_designation_description,
            'designation_abbr'=>$this->upd_designation_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($designation_id){
        $info = DesignationModel::find($designation_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->designation_description.'</strong>',
            'id'=>$designation_id
        ]);
    }




    public function delete($designation_id){
        $del =  DesignationModel::find($designation_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }



}
