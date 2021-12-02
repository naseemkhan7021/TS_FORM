<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Gender as GenderModel;

class Gender extends Component
{

    public $searchQuery;
    public $gender_description , $gender_abbr;
    public $cid , $upd_gender_description , $upd_gender_abbr ;

    // public $genders;

    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {
        $genders = GenderModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('gender_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('gender_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('gender_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.common.gender', [
            'genders'=>$genders,
        ]);
    }



    public function OpenAddCountryModal(){
        $this->gender_description = '';
        $this->gender_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'gender_description'=>'required',
             'gender_abbr'=>'required'
        ]);

        $save = GenderModel::insert([
              'gender_description'=>$this->gender_description,
              'gender_abbr'=>$this->gender_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($gender_id){
        $info = GenderModel::find($gender_id);

        $this->upd_gender_description = $info->gender_description;
        $this->upd_gender_abbr = $info->gender_abbr;
        $this->cid = $info->gender_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'gender_id'=>$gender_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_gender_description'=>'required' ,
              'upd_gender_abbr'=>'required'
        ],[

            'upd_gender_description.required'=>'Enter Gender Description',
            'upd_gender_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = GenderModel::find($cid)->update([
            'gender_description'=>$this->upd_gender_description,
            'gender_abbr'=>$this->upd_gender_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($gender_id){
        $info = GenderModel::find($gender_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->gender_description.'</strong>',
            'id'=>$gender_id
        ]);
    }




    public function delete($gender_id){
        $del =  GenderModel::find($gender_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
