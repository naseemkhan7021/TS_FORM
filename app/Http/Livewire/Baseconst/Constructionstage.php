<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use App\Models\baseconst\ConstructionStage as ConstructionStageModel;

class Constructionstage extends Component
{

    public $searchQuery;
    public $construction_stages_description , $construction_stages_abbr;
    public $cid , $upd_construction_stages_description , $upd_construction_stages_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $constructionstages = ConstructionStageModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('construction_stages_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('construction_stages_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('construction_stages_id','desc')->paginate(10);

        return view('livewire.baseconst.constructionstage', [
            'constructionstages'=>$constructionstages,
        ]);

    }


    public function OpenAddCountryModal(){
        $this->construction_stages_description = '';
        $this->construction_stages_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'construction_stages_description'=>'required',
             'construction_stages_abbr'=>'required'
        ]);

        $save = ConstructionStageModel::insert([
              'construction_stages_description'=>$this->construction_stages_description,
              'construction_stages_abbr'=>$this->construction_stages_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($construction_stages_id){
        $info = ConstructionStageModel::find($construction_stages_id);

        $this->upd_construction_stages_description = $info->construction_stages_description;
        $this->upd_construction_stages_abbr = $info->construction_stages_abbr;
        $this->cid = $info->construction_stages_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'construction_stages_id'=>$construction_stages_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_construction_stages_description'=>'required' ,
              'upd_construction_stages_abbr'=>'required'
        ],[

            'upd_construction_stages_description.required'=>'Enter Gender Description',
            'upd_construction_stages_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = ConstructionStageModel::find($cid)->update([
            'construction_stages_description'=>$this->upd_construction_stages_description,
            'construction_stages_abbr'=>$this->upd_construction_stages_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($construction_stages_id){
        $info = ConstructionStageModel::find($construction_stages_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->construction_stages_description.'</strong>',
            'id'=>$construction_stages_id
        ]);
    }




    public function delete($construction_stages_id){
        $del =  ConstructionStageModel::find($construction_stages_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }





}
