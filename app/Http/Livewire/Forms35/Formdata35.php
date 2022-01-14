<?php

namespace App\Http\Livewire\Forms35;

use App\Models\common_forms\Dept_Default_Docs;
use App\Models\common_forms\Projects;
use App\Models\forms_00\formdata_00;
use App\Models\forms_01\activity;
use App\Models\forms_35\form35_checkpoint;
use App\Models\forms_35\formdata_35;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

use PDF;
// return view('livewire.forms35.formdata35');
class Formdata35 extends Component
{

    use WithPagination;
    protected $listeners = ['delete', 'selectedProjectID'];
    public $parmitNo, $working_dt, $working_t_F, $working_t_T, $contractor_name, $supervisor_name, $no_of_people_working, $form35_checkpoint_ids, $activity_ids, $form35_checkpoint_remarks = [], $exact_location_nature_of_work_ids, $name_of_permit_issuing_authority, $sing_of_permit_issuing_authority, $name_permit_receiver, $sing_permit_receiver, $name_safety_representative, $sing_safety_representative, $name_of_permit_issuing_receiver_if_complete, $sing_of_permit_issuing_receiver_if_complete, $permit_issuing_receiver_if_complete_sing_dt, $name_of_permit_issuing_authority_if_complete, $sing_of_permit_issuing_authority_if_complete, $permit_issuing_authority_if_complete_sing_dt, $name_of_site_safety_officer, $sing_of_site_safety_officer, $permit_close_or_continued, $tags_removed;

    public $ibc_id_fk, $idepartment_id_fk, $iproject_id_fk, $sproject_location, $ddd_id_fk, $userID, $fille_date;
    public $searchQuery, $old_iproject_id_fk;

    public $cid;

    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }

    public function mount()
    {
        $this->searchQuery = '';
        $this->iproject_id_fk = session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*' ? session('globleSelectedProjectID') : 0;

        $this->userID = Auth::user()->id;
        $this->ddd_id_fk = 35;
    }

    public function render()
    {

        $formData35 = formdata_35::select('formdata_35s.*', 'projects.sproject_name')
            ->join('projects', 'projects.iproject_id', '=', 'formdata_35s.iproject_id_fk')
            ->where(['formdata_35s.bactive' => '1', 'formdata_35s.user_created' => $this->userID])
            ->when(session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*', function ($data) {
                # code...
                $data->where('iproject_id_fk', '=', session('globleSelectedProjectID'))
                    ->where(['formdata_35s.bactive' => '1', 'formdata_35s.user_created' => $this->userID]);
            })
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('contractor_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('parmitNo', 'like', '%' . $this->searchQuery . '%');
            })
            ->orderBy('formdata_35s_id', 'asc')->paginate(30);

        // dd($formData35);
        $data = [
            'projectData' => Projects::where(['projects.bactive' => '1', 'projects.user_created' => $this->userID])->get(),
            'formData35' => $formData35,
            'activity01Data' => activity::get(),
            'checkpointData' => form35_checkpoint::where(['form35_checkpoints.bactive' => '1'])->get(),
        ];
        return view('livewire.forms35.formdata35')->with($data);
    }


    public function OpenAddCountryModal()
    {
        $this->ibc_id_fk = '0';
        $this->idepartment_id_fk = '0';
        // $this->iproject_id_fk = '0'; # come frome main page view/livewire/filename
        // $this->ddd_id_fk = '0'; # come frome this mount
        $this->fille_date = Carbon::now()->format(env('DATE_FORMAT_YMD'));
        $this->parmitNo = '';
        $this->working_dt = '';
        $this->working_t_F = '';
        $this->working_t_T = '';
        $this->contractor_name = '';
        $this->supervisor_name = '';
        $this->no_of_people_working = '';
        $this->form35_checkpoint_ids = [];
        // $this->activity_ids = [];
        $this->form35_checkpoint_remarks = []; # *
        $this->exact_location_nature_of_work_ids = [];

        $this->name_of_permit_issuing_authority = '';
        $this->sing_of_permit_issuing_authority = '';
        $this->name_permit_receiver = '';
        $this->sing_permit_receiver = '';
        $this->name_safety_representative = '';
        $this->sing_safety_representative = '';
        $this->name_of_permit_issuing_receiver_if_complete = '';
        $this->sing_of_permit_issuing_receiver_if_complete = '';
        $this->permit_issuing_receiver_if_complete_sing_dt = '';
        $this->name_of_permit_issuing_authority_if_complete = '';
        $this->sing_of_permit_issuing_authority_if_complete = '';
        $this->permit_issuing_authority_if_complete_sing_dt = '';
        $this->name_of_site_safety_officer = '';
        $this->sing_of_site_safety_officer = '';
        $this->permit_close_or_continued = '';
        $this->tags_removed = '';

        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'ibc_id_fk' => 'required|not_in:0',
            'idepartment_id_fk' => 'required|not_in:0',
            'iproject_id_fk' => 'required|not_in:0',
            'ddd_id_fk' => 'required|not_in:0',
            'parmitNo' => 'required',
            'working_dt' => 'required',
            'working_t_F' => 'required',
            'working_t_T' => 'required',
            'contractor_name' => 'required',
            'supervisor_name' => 'required',
            'no_of_people_working' => 'required',
            'form35_checkpoint_ids' => 'required',
            // 'activity_ids' => 'required',
            'form35_checkpoint_remarks' => 'required', # *
            'exact_location_nature_of_work_ids' => 'required',

            // 'name_of_permit_issuing_authority' => 'required',
            // 'sing_of_permit_issuing_authority' => 'required',
            // 'name_permit_receiver' => 'required',
            // 'sing_permit_receiver' => 'required',
            // 'name_safety_representative' => 'required',
            // 'sing_safety_representative' => 'required',
            // 'name_of_permit_issuing_receiver_if_complete' => 'required',
            // 'sing_of_permit_issuing_receiver_if_complete' => 'required',
            // 'permit_issuing_receiver_if_complete_sing_dt' => 'required',
            // 'name_of_permit_issuing_authority_if_complete' => 'required',
            // 'sing_of_permit_issuing_authority_if_complete' => 'required',
            // 'permit_issuing_authority_if_complete_sing_dt' => 'required',
            // 'name_of_site_safety_officer' => 'required',
            // 'sing_of_site_safety_officer' => 'required',
            // 'permit_close_or_continued' => 'required',
            // 'tags_removed' => 'required',
        ]);

        // $save = formdata_35::insert([
        //     'ibc_id_fk' => $this->ibc_id_fk,
        //     'idepartment_id_fk' => $this->idepartment_id_fk,
        //     'iproject_id_fk' => $this->iproject_id_fk,
        //     'ddd_id_fk' => $this->ddd_id_fk,
        //     'parmitNo' => $this->parmitNo,
        //     'working_dt' => $this->working_dt,
        //     'working_t_F' => $this->working_t_F,
        //     'working_t_T' => $this->working_t_T,
        //     'contractor_name' => $this->contractor_name,
        //     'supervisor_name' => $this->supervisor_name,
        //     'no_of_people_working' => $this->no_of_people_working,
        //     'form35_checkpoint_ids' => implode(',', $this->form35_checkpoint_ids),
        //     // 'activity_ids' => implode(',', $this->activity_ids),
        //     'form35_checkpoint_remarks' => $this->form35_checkpoint_remarks , # *
        //     'exact_location_nature_of_work_ids' => implode(',', $this->exact_location_nature_of_work_ids),

        //     // 'name_of_permit_issuing_authority' => $this->name_of_permit_issuing_authority,
        //     // 'sing_of_permit_issuing_authority' => $this->sing_of_permit_issuing_authority,
        //     // 'name_permit_receiver' => $this->name_permit_receiver,
        //     // 'sing_permit_receiver' => $this->sing_permit_receiver,
        //     // 'name_safety_representative' => $this->name_safety_representative,
        //     // 'sing_safety_representative' => $this->sing_safety_representative,
        //     // 'name_of_permit_issuing_receiver_if_complete' => $this->name_of_permit_issuing_receiver_if_complete,
        //     // 'sing_of_permit_issuing_receiver_if_complete' => $this->sing_of_permit_issuing_receiver_if_complete,
        //     // 'permit_issuing_receiver_if_complete_sing_dt' => $this->permit_issuing_receiver_if_complete_sing_dt,
        //     // 'name_of_permit_issuing_authority_if_complete' => $this->name_of_permit_issuing_authority_if_complete,
        //     // 'sing_of_permit_issuing_authority_if_complete' => $this->sing_of_permit_issuing_authority_if_complete,
        //     // 'permit_issuing_authority_if_complete_sing_dt' => $this->permit_issuing_authority_if_complete_sing_dt,
        //     // 'name_of_site_safety_officer' => $this->name_of_site_safety_officer,
        //     // 'sing_of_site_safety_officer' => $this->sing_of_site_safety_officer,
        //     // 'permit_close_or_continued' => $this->permit_close_or_continued,
        //     // 'tags_removed' => $this->tags_removed,

        //     'user_created' => $this->userID,
        // ]);
        $formdata_35 = new formdata_35;
        $formdata_35->user_created = $this->userID;
        $formdata_35->ibc_id_fk = $this->ibc_id_fk;
        $formdata_35->idepartment_id_fk = $this->idepartment_id_fk;
        $formdata_35->iproject_id_fk = $this->iproject_id_fk;
        $formdata_35->ddd_id_fk = $this->ddd_id_fk;
        $formdata_35->parmitNo = $this->parmitNo;
        $formdata_35->working_dt = $this->working_dt;
        $formdata_35->working_t_F = $this->working_t_F;;
        $formdata_35->working_t_T = $this->working_t_T;;
        $formdata_35->contractor_name = $this->contractor_name;;
        $formdata_35->supervisor_name = $this->supervisor_name;;
        $formdata_35->no_of_people_working = $this->no_of_people_working;;
        $formdata_35->form35_checkpoint_ids = $this->form35_checkpoint_ids;;
        $formdata_35->form35_checkpoint_remarks = $this->form35_checkpoint_remarks;;
        $formdata_35->exact_location_nature_of_work_ids = $this->exact_location_nature_of_work_ids;;


        $save = $formdata_35->save();

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



    public function OpenEditCountryModal($formdata_35s_id)
    {
        $info = formdata_35::find($formdata_35s_id);
        // dd($info);
        $this->fille_date = Carbon::parse($info->created_at)->format(env('DATE_FORMAT_YMD'));
        $this->ibc_id_fk = $info->ibc_id_fk;
        $this->idepartment_id_fk = $info->idepartment_id_fk;
        $this->old_iproject_id_fk = $info->iproject_id_fk;
        $this->parmitNo = $info->parmitNo;
        $this->working_dt = $info->working_dt;
        $this->working_t_F = $info->working_t_F;
        $this->working_t_T = $info->working_t_T;
        $this->contractor_name = $info->contractor_name;
        $this->supervisor_name = $info->supervisor_name;
        $this->no_of_people_working = $info->no_of_people_working;
        $this->form35_checkpoint_ids = $info->form35_checkpoint_ids;
        // $this->activity_ids = explode(',', $info->activity_ids);
        $this->form35_checkpoint_remarks = $info->form35_checkpoint_remarks; # *
        $this->exact_location_nature_of_work_ids = $info->exact_location_nature_of_work_ids;

        // $this->name_of_permit_issuing_authority = $info->name_of_permit_issuing_authority;
        // $this->sing_of_permit_issuing_authority = $info->sing_of_permit_issuing_authority;
        // $this->name_permit_receiver = $info->name_permit_receiver;
        // $this->sing_permit_receiver = $info->sing_permit_receiver;
        // $this->name_safety_representative = $info->name_safety_representative;
        // $this->sing_safety_representative = $info->sing_safety_representative;
        // $this->name_of_permit_issuing_receiver_if_complete = $info->name_of_permit_issuing_receiver_if_complete;
        // $this->sing_of_permit_issuing_receiver_if_complete = $info->sing_of_permit_issuing_receiver_if_complete;
        // $this->permit_issuing_receiver_if_complete_sing_dt = $info->permit_issuing_receiver_if_complete_sing_dt;
        // $this->name_of_permit_issuing_authority_if_complete = $info->name_of_permit_issuing_authority_if_complete;
        // $this->sing_of_permit_issuing_authority_if_complete = $info->sing_of_permit_issuing_authority_if_complete;
        // $this->permit_issuing_authority_if_complete_sing_dt = $info->permit_issuing_authority_if_complete_sing_dt;
        // $this->name_of_site_safety_officer = $info->name_of_site_safety_officer;
        // $this->sing_of_site_safety_officer = $info->sing_of_site_safety_officer;
        // $this->permit_close_or_continued = $info->permit_close_or_continued;
        // $this->tags_removed = $info->tags_removed;



        $this->cid = $info->formdata_35s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_35s_id' => $formdata_35s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'ibc_id_fk' => 'required|not_in:0',
            'idepartment_id_fk' => 'required|not_in:0',
            'iproject_id_fk' => 'required|not_in:0',
            'ddd_id_fk' => 'required|not_in:0',
            'parmitNo' => 'required',
            'working_dt' => 'required',
            'working_t_F' => 'required',
            'working_t_T' => 'required',
            'contractor_name' => 'required',
            'supervisor_name' => 'required',
            'no_of_people_working' => 'required',
            'form35_checkpoint_ids' => 'required|not_in:0',
            // 'activity_ids' => 'required|not_in:0',
            'form35_checkpoint_remarks' => 'required', # *
            'exact_location_nature_of_work_ids' => 'required|not_in:0',

            // 'name_of_permit_issuing_authority' => 'required',
            // 'sing_of_permit_issuing_authority' => 'required',
            // 'name_permit_receiver' => 'required',
            // 'sing_permit_receiver' => 'required',
            // 'name_safety_representative' => 'required',
            // 'sing_safety_representative' => 'required',
            // 'name_of_permit_issuing_receiver_if_complete' => 'required',
            // 'sing_of_permit_issuing_receiver_if_complete' => 'required',
            // 'permit_issuing_receiver_if_complete_sing_dt' => 'required',
            // 'name_of_permit_issuing_authority_if_complete' => 'required',
            // 'sing_of_permit_issuing_authority_if_complete' => 'required',
            // 'permit_issuing_authority_if_complete_sing_dt' => 'required',
            // 'name_of_site_safety_officer' => 'required',
            // 'sing_of_site_safety_officer' => 'required',
            // 'permit_close_or_continued' => 'required',
            // 'tags_removed' => 'required',
        ]);

        $update = formdata_35::find($cid)->update([
            'ibc_id_fk' => $this->ibc_id_fk,
            'idepartment_id_fk' => $this->idepartment_id_fk,
            'iproject_id_fk' => $this->iproject_id_fk,
            'parmitNo' => $this->parmitNo,
            'working_dt' => $this->working_dt,
            'working_t_F' => $this->working_t_F,
            'working_t_T' => $this->working_t_T,
            'contractor_name' => $this->contractor_name,
            'supervisor_name' => $this->supervisor_name,
            'no_of_people_working' => $this->no_of_people_working,
            'form35_checkpoint_ids' => $this->form35_checkpoint_ids,
            // 'activity_ids' => implode(',', $this->activity_ids),
            'form35_checkpoint_remarks' => $this->form35_checkpoint_remarks, # *
            'exact_location_nature_of_work_ids' => $this->exact_location_nature_of_work_ids,

            // 'name_of_permit_issuing_authority' => $this->name_of_permit_issuing_authority,
            // 'sing_of_permit_issuing_authority' => $this->sing_of_permit_issuing_authority,
            // 'name_permit_receiver' => $this->name_permit_receiver,
            // 'sing_permit_receiver' => $this->sing_permit_receiver,
            // 'name_safety_representative' => $this->name_safety_representative,
            // 'sing_safety_representative' => $this->sing_safety_representative,
            // 'name_of_permit_issuing_receiver_if_complete' => $this->name_of_permit_issuing_receiver_if_complete,
            // 'sing_of_permit_issuing_receiver_if_complete' => $this->sing_of_permit_issuing_receiver_if_complete,
            // 'permit_issuing_receiver_if_complete_sing_dt' => $this->permit_issuing_receiver_if_complete_sing_dt,
            // 'name_of_permit_issuing_authority_if_complete' => $this->name_of_permit_issuing_authority_if_complete,
            // 'sing_of_permit_issuing_authority_if_complete' => $this->sing_of_permit_issuing_authority_if_complete,
            // 'permit_issuing_authority_if_complete_sing_dt' => $this->permit_issuing_authority_if_complete_sing_dt,
            // 'name_of_site_safety_officer' => $this->name_of_site_safety_officer,
            // 'sing_of_site_safety_officer' => $this->sing_of_site_safety_officer,
            // 'permit_close_or_continued' => $this->permit_close_or_continued,
            // 'tags_removed' => $this->tags_removed,

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
        }
    }

    public function ganaratePDF($id)
    {
        // dd($id);
        $formData = formdata_35::find($id);
        $data = [
            'formHeader' => Dept_Default_Docs::find($this->ddd_id_fk),
            'formData' => $formData,
            'activity'=>activity::select('activity_description')->whereIn('activity_id',$formData->exact_location_nature_of_work_ids)->get(),
            'checkpointData' => form35_checkpoint::where(['form35_checkpoints.bactive' => '1'])->get(),
        ];
        $pdf = PDF::loadView('exports.Forms.form35', $data)->setPaper('A4', 'portrait')->output(); //
        return response()->streamDownload(fn () => print($pdf), 'form35_' . time() . '.pdf');
    }

    public function deleteConfirm($formdata_35s_id)
    {
        $info = formdata_35::find($formdata_35s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->contractor_name . '</strong>',
            'id' => $formdata_35s_id
        ]);
    }



    public function delete($formdata_35s_id)
    {
        $del =  formdata_35::find($formdata_35s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    public function clearValidationf()
    {
        # code...
        $this->resetValidation();
    }
}
