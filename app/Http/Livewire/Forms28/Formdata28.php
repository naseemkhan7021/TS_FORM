<?php

namespace App\Http\Livewire\Forms28;

use App\Models\common_forms\prioritytimescale;
use App\Models\common_forms\Projects;
use App\Models\forms_00\formdata_00;
use App\Models\forms_28\formdata_28;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Formdata28 extends Component
{
    use WithPagination;
    protected $listeners = ['delete','selectedProjectID'];
    public $ibc_id_fk,$observer_name, $idepartment_id_fk, $iproject_id_fk, $observation_desc, $noticed_time, $recommend_corrective_action, $location, $responsible_person, $sign_resp_person, $closed_dt, $remarks, $prioritytimescales_id_fk;

    public $searchQuery,$ddd_id_fk,$sproject_location,$date,$userID,$old_iproject_id_fk;

    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }

    public function mount()
    {
        $this->searchQuery = '';
        $this->ddd_id_fk = 28;
        $this->iproject_id_fk = session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*' ? session('globleSelectedProjectID') : 0;

        $this->userID = Auth::user()->id;
    }

    public function render()
    {
        $form28Data = formdata_28::select('formdata_28s.created_at as form28Creat','formdata_28s.formdata_28s_id','formdata_28s.observation_desc', 'formdata_28s.noticed_time', 'formdata_28s.recommend_corrective_action', 'formdata_28s.location', 'prioritytimescales.prioritytimescales_desc', 'projects.sproject_name')
            ->join('projects', 'projects.iproject_id', '=', 'formdata_28s.iproject_id_fk')
            ->join('prioritytimescales', 'prioritytimescales.prioritytimescales_id', 'formdata_28s.prioritytimescales_id_fk')
            ->where(['formdata_28s.bactive' => '1', 'formdata_28s.user_created' => $this->userID])
            ->when(session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*', function ($data) {
                # code...
                $data->where('iproject_id_fk', '=', session('globleSelectedProjectID'))
                    ->where(['formdata_28s.bactive' => '1', 'formdata_28s.user_created' => $this->userID]);
            })
            ->when($this->searchQuery != '', function ($query) {
                $query->where(['formdata_28s.bactive', '1'])
                    ->orWhere('projects.sproject_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('formdata_28s.observation_desc', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('formdata_28s.location', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('formdata_28s.remarks', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('formdata_28s_id','asc')->paginate(10);
        $data = [
            'form28Data' => $form28Data,
            'prioritytimescaleData' => prioritytimescale::get(),
            'projectData' => Projects::where(['projects.bactive'=> '1','projects.user_created'=>$this->userID])->get(),
        ];
        return view('livewire.forms28.formdata28')->with($data);
    }

    public function OpenAddCountryModal()
    {

        $this->ibc_id_fk = '0';
        $this->date = now()->format(env('DATE_FORMAT_YMD'));
        $this->idepartment_id_fk = '0';
        // $this->iproject_id_fk = '0';
        // $this->ddd_id_fk = '0';
        $this->prioritytimescales_id_fk = '0';
        $this->observation_desc = '';
        $this->observer_name = '';
        $this->noticed_time = '';
        $this->recommend_corrective_action = '';
        $this->location = '';
        $this->responsible_person = '';
        $this->sign_resp_person = '';
        $this->closed_dt = '';
        $this->remarks = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save()
    {
        $this->validate([
            'iproject_id_fk' => 'required|not_in:0',
            'prioritytimescales_id_fk' => 'required|not_in:0',
            'observation_desc' => 'required',
            'observer_name' => 'required',
            'noticed_time' => 'required',
            'recommend_corrective_action' => 'required',
            'location' => 'required',
            'responsible_person' => 'required',
            'sign_resp_person' => 'required|not_in:0',
            'closed_dt' => 'required',
            'remarks' => 'required',
        ]);
        $save = formdata_28::insert([
            'ibc_id_fk' => $this->ibc_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'ddd_id_fk' => $this->ddd_id_fk,
            'prioritytimescales_id_fk' => $this->prioritytimescales_id_fk,
            'observation_desc' => $this->observation_desc,
            'observer_name' => $this->observer_name,
            'noticed_time' => $this->noticed_time,
            'recommend_corrective_action' => $this->recommend_corrective_action,
            'location' => $this->location,
            'responsible_person' => $this->responsible_person,
            'sign_resp_person' => $this->sign_resp_person,
            'closed_dt' => $this->closed_dt,
            'remarks' => $this->remarks,

            'user_created' => $this->userID,
        ]);
        if ($save) {
            $increament = formdata_00::where([
                'user_created' => $this->userID,
                'iproject_id_fk' => $this->iproject_id_fk,
                'idepartment_id_fk' => $this->idepartment_id_fk,
                'ibc_id_fk' => $this->ibc_id_fk,
                'ddd_id_fk' => $this->ddd_id_fk
            ])->increment('counter', 1);
            if ($increament) {
                # code...
                $this->dispatchBrowserEvent('CloseAddCountryModal');
                // $this->checkedCountry = [];
            }
        }
    }

    public function OpenEditCountryModal($formdata_28s_id)
    {
        $info = formdata_28::find($formdata_28s_id);

        $this->ibc_id_fk = $info->ibc_id_fk;
        $this->date = Carbon::parse($info->created_at)->format(env('DATE_FORMAT_YMD'));
        $this->idepartment_id_fk = $info->idepartment_id_fk;
        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->old_iproject_id_fk = $info->iproject_id_fk; // for comparing
        // $this->ddd_id_fk = $info->ddd_id_fk;
        $this->prioritytimescales_id_fk = $info->prioritytimescales_id_fk;
        $this->observation_desc = $info->observation_desc;
        $this->observer_name = $info->observer_name;
        $this->noticed_time = $info->noticed_time;
        $this->recommend_corrective_action = $info->recommend_corrective_action;
        $this->location = $info->location;
        $this->responsible_person = $info->responsible_person;
        $this->sign_resp_person = $info->sign_resp_person;
        $this->closed_dt = $info->closed_dt;
        $this->remarks = $info->remarks;


        $this->cid = $info->formdata_28s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_28s_id' => $formdata_28s_id
        ]);
    }

    //  update
    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'iproject_id_fk' => 'required|not_in:0',
            'prioritytimescales_id_fk' => 'required|not_in:0',
            'observation_desc' => 'required',
            'observer_name' => 'required',
            'noticed_time' => 'required',
            'recommend_corrective_action' => 'required',
            'location' => 'required',
            'responsible_person' => 'required',
            'sign_resp_person' => 'required|not_in:0',
            'closed_dt' => 'required',
            'remarks' => 'required',
        ]);
        $update = formdata_28::find($cid)->update([
            'ibc_id_fk' => $this->ibc_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            // 'ddd_id_fk' => $this->ddd_id_fk,
            'prioritytimescales_id_fk' => $this->prioritytimescales_id_fk,
            'observation_desc' => $this->observation_desc,
            'observer_name' => $this->observer_name,
            'noticed_time' => $this->noticed_time,
            'recommend_corrective_action' => $this->recommend_corrective_action,
            'location' => $this->location,
            'responsible_person' => $this->responsible_person,
            'sign_resp_person' => $this->sign_resp_person,
            'closed_dt' => $this->closed_dt,
            'remarks' => $this->remarks,

            'user_updated' => $this->userID,
        ]);

        if ($update) {
            if ($this->old_iproject_id_fk != $this->iproject_id_fk) {
                # code...
                formdata_00::where([
                    'user_created' => $this->userID,
                    'iproject_id_fk' => $this->old_iproject_id_fk,
                    'ddd_id_fk' => $this->ddd_id_fk
                ])->decrement('counter', 1);

                formdata_00::where([
                    'user_created' => $this->userID,
                    'iproject_id_fk' => $this->iproject_id_fk,
                    'idepartment_id_fk' => $this->idepartment_id_fk,
                    'ibc_id_fk' => $this->ibc_id_fk,
                    'ddd_id_fk' => $this->ddd_id_fk
                ])->increment('counter', 1);
            }
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

     // delete 
     public function deleteConfirm($formdata_28s_id)
     {
        //  dd($formdata_28s_id);
         $info = formdata_28::find($formdata_28s_id);
         $this->dispatchBrowserEvent('SwalConfirm', [
             'title' => 'Are you sure?',
             'html' => 'You want to delete <strong>' . $info->observation_desc . '</strong>',
             'id' => $formdata_28s_id
         ]);
     }
 
     public function delete($formdata_28s_id)
     {
         $del =  formdata_28::find($formdata_28s_id)->delete();
         if ($del) {
             $this->dispatchBrowserEvent('delete');
         }
         // $this->checkedCountry = [];
     }

    public function clearValuesandValidation()
    {
        # code...
        $this->resetValidation();
        // $this->imgsId = '';
    }
}
