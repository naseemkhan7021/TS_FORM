<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\common\Language as LanguageModel;

class Language extends Component
{

    public $searchQuery;
    public $language_description , $language_abbr;
    public $cid , $upd_language_description , $upd_language_abbr ;


    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {
        $languages = LanguageModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('language_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('language_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('language_id','desc')->paginate(10);

        // dd($genders);

        return view('livewire.common.language', [
            'languages'=>$languages,
        ]);

    }



    public function OpenAddCountryModal(){
        $this->language_description = '';
        $this->language_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'language_description'=>'required',
             'language_abbr'=>'required'
        ]);

        $save = LanguageModel::insert([
              'language_description'=>$this->language_description,
              'language_abbr'=>$this->language_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($language_id){
        $info = LanguageModel::find($language_id);

        $this->upd_language_description = $info->language_description;
        $this->upd_language_abbr = $info->language_abbr;
        $this->cid = $info->language_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'language_id'=>$language_id
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_language_description'=>'required' ,
              'upd_language_abbr'=>'required'
        ],[

            'upd_language_description.required'=>'Enter language Description',
            'upd_language_abbr.required'=>'Language Abbrivation require'
        ]);

        $update = LanguageModel::find($cid)->update([
            'language_description'=>$this->upd_language_description,
            'language_abbr'=>$this->upd_language_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($language_id){
        $info = LanguageModel::find($language_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->language_description.'</strong>',
            'id'=>$language_id
        ]);
    }




    public function delete($language_id){
        $del =  LanguageModel::find($language_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }


}
