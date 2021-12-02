<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use App\Models\baseconst\PaymentMode as PaymentModeModel;

class Paymentmode extends Component
{


    public $searchQuery;
    public $paymentmode_description , $paymentmode_abbr;
    public $cid , $upd_paymentmode_description , $upd_paymentmode_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $paymentmodes = PaymentModeModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('paymentmode_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('paymentmode_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('paymentmode_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.baseconst.paymentmode', [
            'paymentmodes'=>$paymentmodes,
        ]);



    }


    public function OpenAddCountryModal(){
        $this->paymentmode_description = '';
        $this->paymentmode_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'paymentmode_description'=>'required',
             'paymentmode_abbr'=>'required'
        ]);

        $save = PaymentModeModel::insert([
              'paymentmode_description'=>$this->paymentmode_description,
              'paymentmode_abbr'=>$this->paymentmode_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($paymentmode_id){
        $info = PaymentModeModel::find($paymentmode_id);

        $this->upd_paymentmode_description = $info->paymentmode_description;
        $this->upd_paymentmode_abbr = $info->paymentmode_abbr;
        $this->cid = $info->paymentmode_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'paymentmode_id'=>$paymentmode_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_paymentmode_description'=>'required' ,
              'upd_paymentmode_abbr'=>'required'
        ],[

            'upd_paymentmode_description.required'=>'Enter Gender Description',
            'upd_paymentmode_abbr.required'=>'Gender Abbrivation require'
        ]);

        $update = PaymentModeModel::find($cid)->update([
            'paymentmode_description'=>$this->upd_paymentmode_description,
            'paymentmode_abbr'=>$this->upd_paymentmode_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($paymentmode_id){
        $info = PaymentModeModel::find($paymentmode_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->paymentmode_description.'</strong>',
            'id'=>$paymentmode_id
        ]);
    }




    public function delete($paymentmode_id){
        $del =  PaymentModeModel::find($paymentmode_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
