<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use App\Models\baseconst\LeadSource as LeadSourceModel;

class Leadsource extends Component
{


    public $searchQuery;
    public $source_description , $source_abbr;
    public $cid , $upd_source_description , $upd_source_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {
        $leadsources = LeadSourceModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('source_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('source_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('source_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.baseconst.leadsource', [
            'leadsources'=>$leadsources,
        ]);



    }

    public function OpenAddCountryModal(){
        $this->source_description = '';
        $this->source_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'source_description'=>'required',
             'source_abbr'=>'required'
        ]);

        $save = LeadSourceModel::insert([
              'source_description'=>$this->source_description,
              'source_abbr'=>$this->source_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($source_id){
        $info = LeadSourceModel::find($source_id);

        $this->upd_source_description = $info->source_description;
        $this->upd_source_abbr = $info->source_abbr;
        $this->cid = $info->source_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'source_id'=>$source_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_source_description'=>'required' ,
              'upd_source_abbr'=>'required'
        ],[

            'upd_source_description.required'=>'Enter Gender Description',
            'upd_source_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = LeadSourceModel::find($cid)->update([
            'source_description'=>$this->upd_source_description,
            'source_abbr'=>$this->upd_source_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($source_id){
        $info = LeadSourceModel::find($source_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->source_description.'</strong>',
            'id'=>$source_id
        ]);
    }




    public function delete($source_id){
        $del =  LeadSourceModel::find($source_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
