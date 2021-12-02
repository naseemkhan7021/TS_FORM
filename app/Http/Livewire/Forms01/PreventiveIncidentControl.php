<?php

namespace App\Http\Livewire\Forms01;

use App\Models\forms_01\Preventive_Incident_Control;
use Livewire\Component;

class PreventiveIncidentControl extends Component
{

    public $searchQuery;
    public $preventive_incident_control_description, $preventive_incident_control_abbr;
    public $cid, $upd_preventive_incident_control_description, $upd_preventive_incident_control_abbr;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $preventiveincidentcontrol = Preventive_Incident_Control::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('preventive_incident_control_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('preventive_incident_control_abbr' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('preventive_incident_control_id','desc')->paginate(10);

        return view('livewire.forms01.preventive-incident-control',[
            'preventiveincidentcontrol'=>$preventiveincidentcontrol
        ]);
    }

    public function OpenAddCountryModal(){
        $this->preventive_incident_control_description = '';
        $this->preventive_incident_control_abbr = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    // insert
    public function save(){
        $this->validate([
             'preventive_incident_control_description'=>'required',
             'preventive_incident_control_abbr'=>'required'
        ]);

        $save = Preventive_Incident_Control::insert([
              'preventive_incident_control_description'=>$this->preventive_incident_control_description,
              'preventive_incident_control_abbr'=>$this->preventive_incident_control_abbr,
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($preventive_incident_control_id){
        $info = Preventive_Incident_Control::find($preventive_incident_control_id);

        $this->upd_preventive_incident_control_description = $info->preventive_incident_control_description;
        $this->upd_preventive_incident_control_abbr = $info->preventive_incident_control_abbr;
        $this->cid = $info->preventive_incident_control_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'preventive_incident_control_id'=>$preventive_incident_control_id
        ]);
    }


    //  update
    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_preventive_incident_control_description'=>'required' ,
              'upd_preventive_incident_control_abbr'=>'required'
        ],[

            'upd_preventive_incident_control_description.required'=>'Enter consequence Description',
            'upd_preventive_incident_control_abbr.required'=>'consequence Abbrivation require'
        ]);

        $update = Preventive_Incident_Control::find($cid)->update([
            'preventive_incident_control_description'=>$this->upd_preventive_incident_control_description,
            'preventive_incident_control_abbr'=>$this->upd_preventive_incident_control_abbr
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($preventive_incident_control_id){
        $info = Preventive_Incident_Control::find($preventive_incident_control_id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->preventive_incident_control_description.'</strong>',
            'id'=>$preventive_incident_control_id
        ]);
    }



    public function delete($preventive_incident_control_id){
        $del =  Preventive_Incident_Control::find($preventive_incident_control_id)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
