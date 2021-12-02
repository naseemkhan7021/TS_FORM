<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

use App\Models\common\Qualification as QualificationModel;

class Qualification extends Component
{

    public $searchQuery;
    public $qualification_description , $qualification_abbr;
    public $cid , $upd_qualification_description , $upd_qualification_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {
        $qualifications = QualificationModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('qualification_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('qualification_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('qualification_id','desc')->paginate(10);

        return view('livewire.common.qualification', [
            'qualifications'=>$qualifications,
        ]);


    }



    public function OpenAddCountryModal(){
        $this->qualification_description = '';
        $this->qualification_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'qualification_description'=>'required',
             'qualification_abbr'=>'required'
        ]);

        $save = QualificationModel::insert([
              'qualification_description'=>$this->qualification_description,
              'qualification_abbr'=>$this->qualification_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($qualification_id){
        $info = QualificationModel::find($qualification_id);

        $this->upd_qualification_description = $info->qualification_description;
        $this->upd_qualification_abbr = $info->qualification_abbr;
        $this->cid = $info->qualification_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'qualification_id'=>$qualification_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_qualification_description'=>'required' ,
              'upd_qualification_abbr'=>'required'
        ],[

            'upd_qualification_description.required'=>'Enter Gender Description',
            'upd_qualification_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = QualificationModel::find($cid)->update([
            'qualification_description'=>$this->upd_qualification_description,
            'qualification_abbr'=>$this->upd_qualification_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($qualification_id){
        $info = QualificationModel::find($qualification_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->qualification_description.'</strong>',
            'id'=>$qualification_id
        ]);
    }




    public function delete($qualification_id){
        $del =  QualificationModel::find($qualification_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }


}
