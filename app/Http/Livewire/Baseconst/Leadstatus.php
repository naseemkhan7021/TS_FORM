<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use App\Models\baseconst\LeadStatus as LeadstatusModel;

class Leadstatus extends Component
{


    public $searchQuery;
    public $leadstatus_description , $leadstatus_abbr;
    public $cid , $upd_leadstatus_description , $upd_leadstatus_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $leadstatus = LeadstatusModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('leadstatus_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('leadstatus_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('leadstatus_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.baseconst.leadstatus', [
            'leadstatus'=>$leadstatus,
        ]);



    }

    public function OpenAddCountryModal(){
        $this->leadstatus_description = '';
        $this->leadstatus_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'leadstatus_description'=>'required',
             'leadstatus_abbr'=>'required'
        ]);

        $save = LeadstatusModel::insert([
              'leadstatus_description'=>$this->leadstatus_description,
              'leadstatus_abbr'=>$this->leadstatus_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($leadstatus_id){
        $info = LeadstatusModel::find($leadstatus_id);

        $this->upd_leadstatus_description = $info->leadstatus_description;
        $this->upd_leadstatus_abbr = $info->leadstatus_abbr;
        $this->cid = $info->leadstatus_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'leadstatus_id'=>$leadstatus_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_leadstatus_description'=>'required' ,
              'upd_leadstatus_abbr'=>'required'
        ],[

            'upd_leadstatus_description.required'=>'Enter Gender Description',
            'upd_leadstatus_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = LeadstatusModel::find($cid)->update([
            'leadstatus_description'=>$this->upd_leadstatus_description,
            'leadstatus_abbr'=>$this->upd_leadstatus_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($leadstatus_id){
        $info = LeadstatusModel::find($leadstatus_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->leadstatus_description.'</strong>',
            'id'=>$leadstatus_id
        ]);
    }




    public function delete($leadstatus_id){
        $del =  LeadstatusModel::find($leadstatus_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }



}
