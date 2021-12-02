<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use App\Models\baseconst\Salesunit as SalesunitModel;

class Salesunit extends Component
{

    public $searchQuery;
    public $salesunit_description , $salesunit_abbr;
    public $cid , $upd_salesunit_description , $upd_salesunit_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {
        $salesunits = SalesunitModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('salesunit_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('salesunit_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('salesunit_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.baseconst.salesunit', [
            'salesunits'=>$salesunits,
        ]);

    }


    public function OpenAddCountryModal(){
        $this->salesunit_description = '';
        $this->salesunit_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'salesunit_description'=>'required',
             'salesunit_abbr'=>'required'
        ]);

        $save = SalesunitModel::insert([
              'salesunit_description'=>$this->salesunit_description,
              'salesunit_abbr'=>$this->salesunit_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($salesunit_id){
        $info = SalesunitModel::find($salesunit_id);

        $this->upd_salesunit_description = $info->salesunit_description;
        $this->upd_salesunit_abbr = $info->salesunit_abbr;
        $this->cid = $info->salesunit_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'salesunit_id'=>$salesunit_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_salesunit_description'=>'required' ,
              'upd_salesunit_abbr'=>'required'
        ],[

            'upd_salesunit_description.required'=>'Enter Gender Description',
            'upd_salesunit_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = SalesunitModel::find($cid)->update([
            'salesunit_description'=>$this->upd_salesunit_description,
            'salesunit_abbr'=>$this->upd_salesunit_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($salesunit_id){
        $info = SalesunitModel::find($salesunit_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->salesunit_description.'</strong>',
            'id'=>$salesunit_id
        ]);
    }




    public function delete($salesunit_id){
        $del =  SalesunitModel::find($salesunit_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }






}
