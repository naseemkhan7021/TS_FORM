<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\projcon\Project;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Headerdata extends Component
{
    public $selectedProjectID = 1;

    public  function mount()
    {
        $this->selectedProjectID = 1;
    }

    public function render()
    {
        $defaultvalues = DB::table('defaultdatas')
        ->leftjoin('companies','companies.ibc_id','=','defaultdatas.ibc_id_fk' )
        ->leftjoin('departments','departments.idepartment_id','=','defaultdatas.idepartment_id_fk' )
        ->leftjoin('projects','projects.iproject_id','=','defaultdatas.iproject_id_fk' )
        ->where('defaultdatas.bactive','1')
        ->get();

        $projects = Project::all();

        // dd($defaultvalues);

        return view('livewire.common-forms.headerdata',[
            'defaultvalues' => $defaultvalues,'projects'=>$projects
        ]);

    }

    public function setProjectId()
    {
        # code...
        $this->emit('selectedProjectID',$this->selectedProjectID);
    }
}
