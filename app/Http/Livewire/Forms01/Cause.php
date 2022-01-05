<?php

namespace App\Http\Livewire\Forms01;

use Livewire\Component;
use App\Models\forms_01\Cause as CauseModel;
use Illuminate\Support\Facades\Auth;

class Cause extends Component
{
    public $searchQuery;
    public $causes_description, $causes_abbr;
    public $cid , $upd_causes_description, $upd_causes_abbr,$userID;


    public function mount()
    {
        $this->searchQuery = '';
        $this->userID = Auth::user()->id;
    }

    public function render()
    {
        $causedata = CauseModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('causes_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('causes_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('causes_id','desc')->paginate(10);

        return view('livewire.forms01.cause',[
            'causedata' => $causedata
        ]);
    }


    public function OpenAddCountryModal(){
        $this->causes_description = '';
        $this->causes_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save(){
        $this->validate([
             'causes_description'=>'required',
             'causes_abbr'=>'required'
        ]);

        $save = CauseModel::insert([
              'causes_description'=>$this->causes_description,
              'causes_abbr'=>$this->causes_abbr,

              'user_created' => $this->userID,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($causes_id){
        $info = CauseModel::find($causes_id);

        $this->upd_causes_description = $info->causes_description;
        $this->upd_causes_abbr = $info->causes_abbr;
        $this->cid = $info->causes_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'causes_id'=>$causes_id
        ]);
    }



    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_causes_description'=>'required' ,
              'upd_causes_abbr'=>'required'
        ],[

            'upd_causes_description.required'=>'Enter Cause Description',
            'upd_causes_abbr.required'=>'Cause Abbrivation require'
        ]);

        $update = CauseModel::find($cid)->update([
            'causes_description'=>$this->upd_causes_description,
            'causes_abbr'=>$this->upd_causes_abbr,

            'user_updated' => $this->userID,
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($causes_id){
        $info = CauseModel::find($causes_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->causes_description.'</strong>',
            'id'=>$causes_id
        ]);
    }



    public function delete($causes_id){
        $del =  CauseModel::find($causes_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
