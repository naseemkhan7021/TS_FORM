<?php

namespace App\Http\Livewire\Forms22;

use App\Models\common_forms\Dept_Default_Docs;
use App\Models\common_forms\Projects;
use App\Models\forms_00\formdata_00;
use App\Models\forms_22\formdata_22_header;
use App\Models\forms_22\formdata_22_participant;
use App\Models\forms_22\topic_discussed;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDF;
class Headers extends Component
{
    protected $listeners = ['delete', 'selectedProjectID'];
    public $searchQuery, $role;
    public $contractor_name, $faculty_name, $iproject_id_fk, $ibc_id_fk, $idepartment_id_fk, $venue, $duration, $topic_discusseds_ids, $faculty_sign, $site_safety_in_charge_sign, $site_safety_in_charge_name, $sproject_location, $ehsind_dt, $userID;
    public   $partisipanceId, $id_no = [];
    public $cid, $ddd_id_fk,$old_iproject_id_fk;

    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }

    public function mount()
    {
        $this->searchQuery = '';
        $this->ddd_id_fk = 22;
        $this->topic_discusseds_ids = collect();
        $this->id_no = collect();
        $this->iproject_id_fk = session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*' ? session('globleSelectedProjectID') : 0;

        $this->userID = Auth::user()->id;
    }

    public function render()
    {
        $headerdata = formdata_22_header::join('projects', 'projects.iproject_id', '=', 'formdata_22_headers.iproject_id_fk')
            ->where(['formdata_22_headers.bactive' => '1', 'formdata_22_headers.user_created' => $this->userID])
            ->when(session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*', function ($data) {
                # code...
                $data->where('iproject_id_fk', '=', session('globleSelectedProjectID'))
                    ->where(['formdata_22_headers.bactive' => '1', 'formdata_22_headers.user_created' => $this->userID]);
            })
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('contractor_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('faculty_name', 'like', '%' . $this->searchQuery . '%');
            })->get();

        $projectData = Projects::where(['projects.bactive'=> '1','projects.user_created'=>$this->userID])->get();
        $topicData = topic_discussed::all();
        $partisipanceData = formdata_22_participant::where('formdata_22s_id_fk', '=', $this->cid)->get();
        // dd($partisipanceData);
        return view('livewire.forms22.headers', [
            'headerdata' => $headerdata, 'projectData' => $projectData, 'topicData' => $topicData, 'partisipanceData' => $partisipanceData
        ]);
    }



    public function OpenAddCountryModal()
    {
        $this->contractor_name = '';
        $this->faculty_name = '';
        $this->ehsind_dt = Carbon::now()->format('Y-m-d') . " " . Carbon::now()->format('H:i:s');

        // $this->iproject_id_fk = '';
        $this->venue = '';
        $this->duration = '';
        $this->topic_discusseds_ids = [];
        $this->faculty_sign = '';
        $this->site_safety_in_charge_sign = '';
        $this->site_safety_in_charge_name = '';
        $this->sproject_location = '';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'contractor_name' => 'required',
            'faculty_name' => 'required',
            'iproject_id_fk' => 'required|not_in:0',
            'ehsind_dt' => 'required',
            'venue' => 'required',
            'duration' => 'required',
            'topic_discusseds_ids' => 'required',
            'faculty_sign' => 'required',
            'site_safety_in_charge_sign' => 'required',
            'site_safety_in_charge_name' => 'required',
        ]);

        $save = formdata_22_header::insert([
            'contractor_name' => $this->contractor_name,
            'faculty_name' => $this->faculty_name,

            'ibc_id_fk' => $this->ibc_id_fk,
            'ddd_id_fk' => $this->ddd_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'ehsind_dt' => $this->ehsind_dt,
            'venue' => $this->venue,
            'duration' => $this->duration,
            'topic_discusseds_ids' => implode(',', $this->topic_discusseds_ids),
            'faculty_sign' => $this->faculty_sign,
            'site_safety_in_charge_sign' => $this->site_safety_in_charge_sign,
            'site_safety_in_charge_name' => $this->site_safety_in_charge_name,

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



    public function OpenEditCountryModal($formdata_22s_id, $role = 'Staff')
    {
        // dd($formdata_22s_id);
        $info = formdata_22_header::find($formdata_22s_id);
        $partisipanceData = formdata_22_participant::where('formdata_22s_id_fk', '=', $formdata_22s_id)->get();
        // dd($partisipanceData);
        if (count($partisipanceData) == 0) {
            # code...
            $this->partisipanceId = 0;
            $this->id_no = []; // you can remove it
        } else {
            $this->partisipanceId = $partisipanceData[0] && $partisipanceData[0]->formdata_22_participants_id ? $partisipanceData[0]->formdata_22_participants_id : 0;
            $this->id_no = explode(',', $partisipanceData[0]->id_no);
            // $this->desgination = explode(',', $partisipanceData->desgination);
            // $this->id_no = explode(',', $partisipanceData->id_no);
            // $this->participant_name = explode(',', $partisipanceData->participant_name);
        }


        $this->role = $role;

        $this->contractor_name = $info->contractor_name;
        $this->faculty_name = $info->faculty_name;

        $this->ehsind_dt = $info->ehsind_dt;
        $this->venue = $info->venue;
        $this->duration = $info->duration;
        $this->topic_discusseds_ids = explode(',', $info->topic_discusseds_ids);
        $this->faculty_sign = $info->faculty_sign;
        $this->site_safety_in_charge_sign = $info->site_safety_in_charge_sign;
        $this->site_safety_in_charge_name = $info->site_safety_in_charge_name;
        $this->old_iproject_id_fk = $info->iproject_id_fk; // for comparing
        $this->iproject_id_fk = $info->iproject_id_fk;
        $this->ibc_id_fk = $info->ibc_id_fk;
        $this->idepartment_id_fk = $info->idepartment_id_fk;

        $this->cid = $info->formdata_22s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_22s_id' => $formdata_22s_id,
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'contractor_name' => 'required',
            'faculty_name' => 'required',

            'iproject_id_fk' => 'required|not_in:0',
            'ehsind_dt' => 'required',
            'venue' => 'required',
            'duration' => 'required',
            'topic_discusseds_ids' => 'required',
            'faculty_sign' => 'required',
            'site_safety_in_charge_sign' => 'required',
            'site_safety_in_charge_name' => 'required',
        ]);

        $update = formdata_22_header::find($cid)->update([
            'contractor_name' => $this->contractor_name,
            'faculty_name' => $this->faculty_name,

            'ibc_id_fk' => $this->ibc_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'ehsind_dt' => $this->ehsind_dt,
            'venue' => $this->venue,
            'duration' => $this->duration,
            'topic_discusseds_ids' => implode(',', $this->topic_discusseds_ids),
            'faculty_sign' => $this->faculty_sign,
            'site_safety_in_charge_sign' => $this->site_safety_in_charge_sign,
            'site_safety_in_charge_name' => $this->site_safety_in_charge_name,

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


    public function ganaratePDF()
    {
        # code...
        // $defaultData = Defaultdata::find(1)->join('companies', 'companies.ibc_id', '=', 'defaultdatas.ibc_id_fk')->join('projects', 'projects.iproject_id', '=', 'defaultdatas.iproject_id_fk')->join('departments', 'departments.idepartment_id', '=', 'defaultdatas.idepartment_id_fk')->get();
        // $formHeader = Dept_Default_Docs::find($this->ddd_id_fk);

        // dd($formHeader);
        $data = [
            'formHeader'=>Dept_Default_Docs::find($this->ddd_id_fk),
            'headerData'=>formdata_22_header::find($this->cid)->join('projects', 'projects.iproject_id', '=', 'formdata_22_headers.iproject_id_fk')->get()[0],
            'partisipanceData' => formdata_22_participant::where('formdata_22s_id_fk', '=', $this->cid)->get()[0],
            'topicData'=>topic_discussed::get(),
        ];
        $pdf = PDF::loadView('exports.Forms.form22', $data)->setPaper('A4', 'portrait')->output(); //
        return response()->streamDownload(fn () => print($pdf),'form22.pdf');

    }



    public function deleteConfirm($formdata_22s_id)
    {
        $info = formdata_22_header::find($formdata_22s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->contractor_name . '</strong>',
            'id' => $formdata_22s_id
        ]);
    }



    public function delete($formdata_22s_id)
    {
        $del =  formdata_22_header::find($formdata_22s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    public function clearValidationf()
    {
        # code...
        $this->resetValidation();
        // $this->imgsId = '';
    }

    public function openParticipantsModel($id)
    {
        session(['partisipanceId' => $id]);
        // dd(url()->previous());
        return redirect('form22_participant')->with('goTo', 'headerToPartisipance');
        // dd($id);
    }
}
