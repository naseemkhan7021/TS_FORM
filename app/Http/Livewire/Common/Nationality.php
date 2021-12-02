<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Nationality as NationalityModel;;

class Nationality extends Component
{

    public $searchQuery;
    public $nationality_description , $nationality_abbr;
    public $cid , $upd_nationality_description , $upd_nationality_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {
        $nationalities = NationalityModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('nationality_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('nationality_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('nationality_id','desc')->paginate(10);



        return view('livewire.common.nationality', [
            'nationalities'=>$nationalities,
        ]);


    }

        public function OpenAddCountryModal(){
            $this->nationality_description = '';
            $this->nationality_abbr = '';
            $this->dispatchBrowserEvent('OpenAddCountryModal');
        }

        public function save(){
            $this->validate([
                 'nationality_description'=>'required',
                 'nationality_abbr'=>'required'
            ]);

            $save = NationalityModel::insert([
                  'nationality_description'=>$this->nationality_description,
                  'nationality_abbr'=>$this->nationality_abbr,
            ]);

            if($save){
                $this->dispatchBrowserEvent('CloseAddCountryModal');
                // $this->checkedCountry = [];
            }
        }





        public function OpenEditCountryModal($nationality_id){
            $info = NationalityModel::find($nationality_id);

            $this->upd_nationality_description = $info->nationality_description;
            $this->upd_nationality_abbr = $info->nationality_abbr;
            $this->cid = $info->nationality_id;
            $this->dispatchBrowserEvent('OpenEditCountryModal',[
                'nationality_id'=>$nationality_id
            ]);
        }

        public function update(){
            $cid = $this->cid;
            $this->validate([
                  'upd_nationality_description'=>'required' ,
                  'upd_nationality_abbr'=>'required'
            ],[

                'upd_nationality_description.required'=>'Enter Nationality Description',
                'upd_nationality_abbr.required'=>'Nationality Abbrivation require'
            ]);

            $update = NationalityModel::find($cid)->update([
                'nationality_description'=>$this->upd_nationality_description,
                'nationality_abbr'=>$this->upd_nationality_abbr
            ]);

            if($update){
                $this->dispatchBrowserEvent('CloseEditCountryModal');
                // $this->checkedCountry = [];
            }
        }






        public function deleteConfirm($nationality_id){
            $info = NationalityModel::find($nationality_id);
            $this->dispatchBrowserEvent('SwalConfirm',[
                'title'=>'Are you sure?',
                'html'=>'You want to delete <strong>'.$info->nationality_description.'</strong>',
                'id'=>$nationality_id
            ]);
        }




        public function delete($nationality_id){
            $del =  NationalityModel::find($nationality_id)->delete();
            if($del){
                $this->dispatchBrowserEvent('delete');
            }
            // $this->checkedCountry = [];
        }



}
