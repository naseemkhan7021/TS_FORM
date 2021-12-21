<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\projcon\Project;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Headerdata extends Component
{


    public function render()
    {
        // $this->emit('projectId', 1);

        $defaultvalues = DB::table('defaultdatas')
        ->join('companies','companies.ibc_id','=','defaultdatas.ibc_id_fk' )
        ->join('departments','departments.idepartment_id','=','defaultdatas.idepartment_id_fk' )
        ->join('projects','projects.iproject_id','=','defaultdatas.iproject_id_fk' )
        ->where('defaultdatas.bactive','1')
        ->get();

        $projects = Project::all();

        // dd($defaultvalues);

        return view('livewire.common-forms.headerdata',[
            'defaultvalues' => $defaultvalues,'projects'=>$projects
        ]);
        
    }
}
