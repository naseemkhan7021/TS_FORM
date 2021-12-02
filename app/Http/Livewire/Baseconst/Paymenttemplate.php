<?php

namespace App\Http\Livewire\Baseconst;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\baseconst\PaymentTemplateBody;
use App\Models\baseconst\PaymentTemplateHead;
use Illuminate\Support\Facades\View;

class Paymenttemplate extends Component
{
    public $searchQuery;

    public $stemplatedescription,    $sdetails,    $mPercentage,    $mAmount,    $iRows;
    public $upd_stemplatedescription,    $upd_sdetails,    $upd_mPercentage,    $upd_mAmount,    $upd_iRows;
    public $usp_paytempID , $upd_templatehead_ID , $cid;
    public $infobodydata2;
    public $infobodydata;
    public $info2;


    public $usp_id=[];

    //  $templatehead_ID;
    public $editBodyIndex=null;
    public $bodydata=[];

    public function mount()
    {
        $this->searchQuery = '';
        $this->iRows = 0;
        $this->mPercentage = 100;
        $this->mAmount = 100;




    }


    public function render()
    {

        $paytemplate = PaymentTemplateHead::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('stemplatedescription' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sdetails' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('mPercentage' , 'like' , '%'.$this->searchQuery.'%')
            ->orwhere('mAmount', 'like' , '%'.$this->searchQuery.'%');

        })
        ->orderBy('templatehead_ID','desc')
        ->get();


        $paytempbody = PaymentTemplateBody::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('templatehead_ID_FK' , '==' , '1');
        })
        ->orderBy('id','asc')
        ->get();


        return view('livewire.baseconst.paymenttemplate' ,[
            'paytemplate'=>$paytemplate, 'paytempbody'=>$paytempbody,
        ]);

    }



    protected $rules=[
        'bodydata.*.sID'=> ['required'],
        'bodydata.*.sDescription'=> ['required'],
        'bodydata.*.iPercentage'=> 'required|numeric',
        'bodydata.*.mAmount'=> 'required|numeric',
    ];

    public $validationAttributes=[
        'bodydata.*.sID'=>'sID',
        'bodydata.*.sDescription'=>'sDescription',
        'bodydata.*.iPercentage'=>'iPercentage',
        'bodydata.*.mAmount'=>'mAmount',
    ];




    public function saveBody($bodyindex)
    {
        $this->validate();
    }


    public function editBody($bodyindex)
    {
        $this->editBodyIndex=$bodyindex;
    }



    public function OpenAddCountryModal(){
        $this->stemplatedescription = '';
        $this->sdetails = '';
        $this->mPercentage = '';
        $this->mAmount = '';
        $this->iRows = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save(){
        $this->validate([
             'stemplatedescription'=>'required',
             'sdetails'=>'required',
             'mPercentage'=>'required|numeric|min:0|not_in:0',
             'mAmount'=>'required|numeric|min:0|not_in:0',
             'iRows'=>'required|numeric|min:0|not_in:0',

        ],[

            'stemplatedescription.required'=>'Enter Temlate Description Required',
            'sdetails.required'=>'Enter Remarks  Required',
            'mPercentage.required'=>'Enter Percentage Required',
            'mAmount.required'=>'Enter Amount Required',
            'iRows.required'=>'Enter Body Rows Required',


        ]);

        $save = PaymentTemplateHead::insert([
              'stemplatedescription'=>$this->stemplatedescription,
              'sdetails'=>$this->sdetails,
              'mPercentage'=>$this->mPercentage,
              'iRows'=>$this->iRows,
              'mAmount'=>$this->mAmount,
        ]);

        $usp_paytempID = DB::getPdo()->lastInsertId();

        if ($this->iRows > 0)
        {
            for($i = 1 ; $i <= $this->iRows ; $i++)
            {

                $savebody = PaymentTemplateBody::insert([
                    'templatehead_ID_FK'=>$usp_paytempID,
                    'iLineID'=>$i,
                    'sID'=>$i,
                    'sDescription'=> 'Change the Description' . $i ,
                    'iPercentage'=> ( $this->mPercentage /$this->iRows ) ,
                    'mAmount'=> ( $this->mAmount / $this->iRows ),
                ]);

            }
        }

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
            // App\Http\Livewire\Baseconst\Paymenttemplate::
            $this->OpenEditCountryModal($usp_paytempID);
        }
    }



    public function OpenEditCountryModal($templatehead_ID){
        $info = PaymentTemplateHead::find($templatehead_ID);

        $this->upd_stemplatedescription = $info->stemplatedescription;
        $this->upd_sdetails = $info->sdetails;
        $this->upd_mAmount = $info->mAmount;
        $this->upd_mPercentage = $info->mPercentage;
        $this->upd_iRows = $info->iRows;
        $this->upd_templatehead_ID = $templatehead_ID;

        $this->cid = $info->templatehead_ID;

        // $info2 = PaymentTemplateBody::where('templatehead_ID_FK','=', $templatehead_ID)->get();

        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'templatehead_ID'=>$templatehead_ID ,
        ]);
    }


    public function update(){
        $cid = $this->cid;
        $this->validate([
            'upd_stemplatedescription'=>'required',
            'upd_sdetails'=>'required',
            'upd_mPercentage'=>'required|numeric|min:0|not_in:0',
            'upd_mAmount'=>'required|numeric|min:0|not_in:0',
            'upd_iRows'=>'required|numeric|min:0|not_in:0',

        ],[

            'upd_stemplatedescription.required'=>'Enter Temlate Description Required',
            'upd_sdetails.required'=>'Enter Remarks  Required',
            'upd_mPercentage.required'=>'Enter Percentage Required',
            'upd_mAmount.required'=>'Enter Amount Required',
            'upd_iRows.required'=>'Enter Body Rows Required',

        ]);

        $update = PaymentTemplateHead::find($cid)->update([
            'stemplatedescription'=>$this->upd_stemplatedescription,
            'sdetails'=>$this->upd_sdetails,
            'mAmount'=>$this->upd_mPercentage,
            'mPercentage'=>$this->upd_mAmount,
            'iRows'=>$this->upd_iRows


        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }





}
