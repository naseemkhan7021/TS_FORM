<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use App\Models\baseconst\ChannelPartner as ChannelPartnerModel;

class Channelpartner extends Component
{

    public $searchQuery;
    public $cp_first_name , $cp_middle_name , $cp_last_name , $cp_mobile , $cp_email , $cp_company_name;
    public $cid , $rera_id;
    public $upd_cp_first_name , $upd_cp_middle_name , $upd_cp_last_name , $upd_cp_mobile , $upd_cp_email , $upd_cp_company_name ,  $upd_rera_id;

    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $cpartners = ChannelPartnerModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('cp_first_name' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('cp_middle_name' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('cp_last_name' , 'like' , '%'.$this->searchQuery.'%')
            ->orwhere('cp_mobile', 'like' , '%'.$this->searchQuery.'%')
            ->orwhere('cp_email', 'like' , '%'.$this->searchQuery.'%')
            ->orwhere('cp_company_name', 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('channelpartner_id','desc')->paginate(10);

        return view('livewire.baseconst.channelpartner', [
            'cpartners'=>$cpartners,
        ]);



    }



    public function OpenAddCountryModal(){
        $this->cp_first_name = '';
        $this->cp_middle_name = '';
        $this->cp_last_name = '';
        $this->cp_mobile = '';
        $this->cp_email = '';
        $this->cp_company_name = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'cp_first_name'=>'required',
             'cp_middle_name'=>'required',
             'cp_last_name'=>'required',
             'cp_mobile'=>'required',
             'cp_email'=>'required',
             'cp_company_name'=>'required'

        ],[

            'cp_first_name.required'=>'Enter First Name Required',
            'cp_middle_name.required'=>'Enter Middle Name  Required',
            'cp_last_name.required'=>'Enter Last Name Required',
            'cp_mobile.required'=>'Enter Email ID Required',
            'cp_email.required'=>'Enter Mobile No Required',
            'cp_company_name.required'=>'Enter Company Name Required'

        ]);

        $save = ChannelPartnerModel::insert([
              'cp_first_name'=>$this->cp_first_name,
              'cp_middle_name'=>$this->cp_middle_name,
              'cp_last_name'=>$this->cp_last_name,
              'cp_email'=>$this->cp_email,
              'cp_mobile'=>$this->cp_mobile,
              'cp_company_name'=>$this->cp_company_name,

        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($channelpartner_id){
        $info = ChannelPartnerModel::find($channelpartner_id);

        $this->upd_cp_first_name = $info->cp_first_name;
        $this->upd_cp_middle_name = $info->cp_middle_name;
        $this->upd_cp_last_name = $info->cp_last_name;
        $this->upd_cp_email = $info->cp_email;
        $this->upd_cp_mobile = $info->cp_mobile;
        $this->upd_cp_company_name = $info->cp_company_name;

        $this->cid = $info->channelpartner_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'channelpartner_id'=>$channelpartner_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_cp_first_name'=>'required' ,
              'upd_cp_middle_name'=>'required',
              'upd_cp_last_name'=>'required' ,
              'upd_cp_email'=>'required',
              'upd_cp_mobile'=>'required' ,
              'upd_cp_company_name'=>'required',

        ],[

            'upd_cp_first_name.required'=>'Enter First Name Required',
            'upd_cp_middle_name.required'=>'Enter Middle Name Abbrivation Required',
            'upd_cp_last_name.required'=>'Enter Last Name Required',
            'upd_cp_email.required'=>'Enter Email ID Required',
            'upd_cp_mobile.required'=>'Enter Mobile No Required',
            'upd_cp_company_name.required'=>'Enter Company Name Required'

        ]);

        $update = ChannelPartnerModel::find($cid)->update([
            'cp_first_name'=>$this->upd_cp_first_name,
            'cp_middle_name'=>$this->upd_cp_middle_name,
            'cp_last_name'=>$this->upd_cp_last_name,
            'cp_email'=>$this->upd_cp_email,
            'cp_mobile'=>$this->upd_cp_mobile,
            'cp_company_name'=>$this->upd_cp_company_name

        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($channelpartner_id){
        $info = ChannelPartnerModel::find($channelpartner_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->cp_first_name.'</strong>',
            'id'=>$channelpartner_id
        ]);
    }




    public function delete($channelpartner_id){
        $del =  ChannelPartnerModel::find($channelpartner_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
