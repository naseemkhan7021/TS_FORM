<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\projcon\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Headerdata extends Component
{
    public $selectedProjectID,$userID;

    public  function mount()
    {
        $this->userID = Auth::user()->id;
        $protject_obj = Project::get();
        if (count($protject_obj) > 0) {
            # code...
            $Pvalue = Project::get()[0]->iproject_id;
        }else{
            $Pvalue = 0;
        }
        // session(['globleSelectedProjectID'=>$Pvalue]);
        $this->selectedProjectID = session()->has('globleSelectedProjectID') && session('globleSelectedProjectID') ? session('globleSelectedProjectID') : $Pvalue;
        // $this->selectedProjectID = session('globleSelectedProjectID') ?? 0; # this this give some issue then uncommnet above code -->  https://github.com/zayedsaleem/tsforms/blob/4e538830dc6db0f07f08de67a891429b9a92f688/app/Http/Livewire/CommonForms/Headerdata.php#L25
        // dd(session('globleSelectedProjectID')); 
    }

    public function render()
    {
        // $this->emit('projectId', 1);

        $defaultvalues = DB::table('defaultdatas')
        ->join('companies','companies.ibc_id','=','defaultdatas.ibc_id_fk' )
        ->join('departments','departments.idepartment_id','=','defaultdatas.idepartment_id_fk' )
        ->join('projects','projects.iproject_id','=','defaultdatas.iproject_id_fk')
        ->where(['defaultdatas.bactive'=> '1'])
        ->get();

        $projects = Project::where(['projects.bactive'=> '1','projects.user_created'=>$this->userID])->get();
        // dd($this->selectedProjectID);
        // dd($defaultvalues);

        return view('livewire.common-forms.headerdata',[
            'defaultvalues' => $defaultvalues,'projects'=>$projects
        ]);

    }

    public function setProjectId()
    {
        # code...
        $this->emit('selectedProjectID',$this->selectedProjectID);
        session(['globleSelectedProjectID'=>$this->selectedProjectID]);
    }
}
