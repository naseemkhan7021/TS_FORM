<?php

namespace App\Http\Livewire\Projcon;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projcon\Projectunits as ProjectUnitModel;

class Projectunit extends Component
{

    use WithPagination;

    public $searchQuery;

    public function mount()
    {
        $this->searchQuery = '';
    }


    public function render()
    {

        $projectunits = ProjectUnitModel::join('salesunits' , 'salesunits.salesunit_id' , '=' , 'projectunits.salesunitid_FK')
        ->join('projectwings' , 'projectwings.iProjectWingID' , '=' , 'projectunits.iProjectWingID_FK')

        ->when($this->searchQuery != '', function($query) {
            $query->where('projectunits.bactive','1')
            ->where('salesunits.salesunit_description' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('projectunits.sManagementUnitID' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('projectwings.sWingDescription' , 'like' , '%'.$this->searchQuery.'%');
        })

        ->orderBy('projectunits.iID','asc')
        ->get([ 'projectunits.*', 'salesunits.*' , 'projectwings.*' ]);





        return view('livewire.projcon.projectunit', [
            'projectunits'=>$projectunits,
        ]);

    }





}
