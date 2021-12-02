<?php

namespace App\Http\Livewire\Projcon;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\projcon\Projectwings;
use App\Models\Projcon\Projectwingfloor;
use App\Models\projcon\Project as ProjectModel;

class Projects extends Component
{

    public $searchQuery;

    public $ProjectID;
    public $sProjectName , $sLocation , $sReraID, $dtStart, $iNoofWings, $iNoofFloors, $iShops, $iOffice, $iFlatPerFloor;
    public $mDevelopmentCostPerSqft, $iSuperLoadingPercentage, $iLoadingPercentage;

    public $upd_sProjectName , $upd_sLocation , $upd_sReraID, $upd_dtStart, $upd_iNoofWings, $upd_iNoofFloors;
    public $upd_iShops, $upd_iOffice, $upd_iFlatPerFloor;
    public $upd_mDevelopmentCostPerSqft, $upd_iSuperLoadingPercentage, $upd_iLoadingPercentage;

    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {

        $projects = ProjectModel::when($this->searchQuery != '', function($query) {
            $query->where('bactive','1')
            ->where('sProjectName' , 'like' , '%'.$this->searchQuery.'%')
            ->orWhere('sLocation' , 'like' , '%'.$this->searchQuery.'%');
        })
        ->orderBy('ProjectID','desc')->paginate(10);

        return view('livewire.projcon.projects', [
            'projects'=>$projects,
        ]);

    }


    public function OpenAddCountryModal(){
        $this->sProjectName = '';
        $this->sLocation = '';
        $this->sReraID = '';
        $this->dtStart ='';
        $this->iNoofWings = 0;
        $this->iNoofFloors = 0;
        $this->iShops = 0;
        $this->iOffice = 0;
        $this->iFlatPerFloor = 0;
        $this->mDevelopmentCostPerSqft = 0;
        $this->iSuperLoadingPercentage = 0 ;
        $this->iLoadingPercentage = 0 ;
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save(){
        $this->validate([
             'sProjectName'=>'required',
             'sLocation'=>'required',
             'dtStart'=> 'date'
        ],[

            'sProjectName.required'=>'Enter Project Name Required',
            'sLocation.required'=>'Enter Location  Required' ,
            'dtStart.date'=>'Enter Valid Date Required',
        ]);

        $save = ProjectModel::insert([
              'sProjectName'=>$this->sProjectName,
              'sLocation'=>$this->sLocation,
              'sReraID'=>$this->sReraID,
              'iNoofWings'=>$this->iNoofWings,
              'dtStart'=>$this->dtStart,
              'iNoofFloors'=>$this->iNoofFloors,
              'iShops'=>$this->iShops,
              'iOffice'=>$this->iOffice,
              'iFlatPerFloor'=>$this->iFlatPerFloor,
              'mDevelopmentCostPerSqft'=>$this->mDevelopmentCostPerSqft,
              'iSuperLoadingPercentage'=>$this->iSuperLoadingPercentage,
              'iLoadingPercentage'=>$this->iLoadingPercentage,
        ]);

        $usp_projectID = DB::getPdo()->lastInsertId();

        if ($this->iNoofWings > 0)
        {
            for($i = 1 ; $i <= $this->iNoofWings ; $i++)
            {
                $save = Projectwings::insert([
                    'sWingDescription'=>$i,
                    'sWingAbbr'=>$i,
                    'iFloors'=>$this->iNoofFloors,
                    'iProjectID_FK'=>$usp_projectID,
              ]);

              $usp_projectwingID = DB::getPdo()->lastInsertId();

              if ($this->iNoofFloors > 0)
              {
                for($f = 0 ; $f <= $this->iNoofFloors ; $f++)
                {
                    $save = Projectwingfloor::insert([
                        'iProjectWingID_FK'=>$usp_projectwingID,
                        'iProjectID_FK'=>$usp_projectID,
                        'sFloorDescription'=>$this->iNoofFloors,
                        'iFloor'=>$usp_projectID,
                        'iUnitsperfloor'=> 3
                  ]);
                }
              }


            }

        }





        if($save){
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }





    public function OpenEditCountryModal($ProjectID){
        $info = ProjectModel::find($ProjectID);

        $this->upd_sProjectName = $info->sProjectName;
        $this->upd_sLocation = $info->sLocation;
        $this->upd_sReraID = $info->sReraID;
        $this->upd_dtStart = $info->dtStart;
        $this->upd_iNoofWings = $info->iNoofWings;
        $this->upd_iNoofFloors = $info->iNoofFloors;
        $this->upd_iShops = $info->iShops;
        $this->upd_iOffice = $info->iOffice;
        $this->upd_iFlatPerFloor = $info->iFlatPerFloor;
        $this->upd_mDevelopmentCostPerSqft = $info->mDevelopmentCostPerSqft;
        $this->upd_iSuperLoadingPercentage = $info->iSuperLoadingPercentage;
        $this->upd_iLoadingPercentage = $info->iLoadingPercentage;

        $this->cid = $info->ProjectID;
        $this->dispatchBrowserEvent('OpenEditCountryModal',[
            'ProjectID'=>$ProjectID
        ]);
    }

    public function update(){
        $cid = $this->cid;
        $this->validate([
              'upd_sProjectName'=>'required' ,
              'upd_sLocation'=>'required',
              'upd_dtStart'=> 'date'
        ],[

            'upd_sProjectName.required'=>'Enter Project Name Required',
            'upd_sLocation.required'=>'Enter Location Required',
            'upd_dtStart.date'=>'Enter Valid Date Required',

        ]);

        $update = ProjectModel::find($cid)->update([
            'sProjectName'=>$this->upd_sProjectName,
            'sLocation'=>$this->upd_sLocation,
            'sReraID'=>$this->upd_sReraID,
            'dtStart'=>$this->upd_dtStart,
            'iNoofWings'=>$this->upd_iNoofWings,
            'iNoofFloors'=>$this->upd_iNoofFloors,
            'iShops'=>$this->upd_iShops,
            'iOffice'=>$this->upd_iOffice,
            'iFlatPerFloor'=>$this->upd_iFlatPerFloor,
            'mDevelopmentCostPerSqft'=>$this->upd_mDevelopmentCostPerSqft,
            'iSuperLoadingPercentage'=>$this->upd_iSuperLoadingPercentage,
            'iLoadingPercentage'=>$this->upd_iLoadingPercentage

        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }






    public function deleteConfirm($ProjectID){
        $info = ProjectModel::find($ProjectID);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <strong>'.$info->sProjectName.'</strong>',
            'id'=>$ProjectID
        ]);
    }




    public function delete($ProjectID){
        $del =  ProjectModel::find($ProjectID)->delete();
        if($del){
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }




}
