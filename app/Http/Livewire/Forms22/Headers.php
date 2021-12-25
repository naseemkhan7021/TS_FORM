<?php

namespace App\Http\Livewire\Forms22;

use App\Models\common_forms\Projects;
use App\Models\forms_22\formdata_22_header;
use App\Models\forms_22\formdata_22_participant;
use App\Models\forms_22\topic_discussed;
use Carbon\Carbon;
use Livewire\Component;

class Headers extends Component
{

    public $searchQuery, $role;
    public $contractor_name, $faculty_name, $iproject_id_fk, $venue, $duration, $topic_discusseds_ids, $faculty_sign, $site_safety_in_charge_sign, $site_safety_in_charge_name, $sproject_location, $ehsind_dt;
    public   $partisipanceId,$id_no = [];
    public $cid;

    public function mount()
    {
        $this->searchQuery = '';
        $this->topic_discusseds_ids = collect();
        $this->id_no = collect();
    }

    public function render()
    {
        $headerdata = formdata_22_header::join('projects', 'projects.iproject_id', '=', 'formdata_22_headers.iproject_id_fk')
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('contractor_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('faculty_name', 'like', '%' . $this->searchQuery . '%');
            })->get();

        $projectData = Projects::all();
        $topicData = topic_discussed::all();
        $partisipanceData = formdata_22_participant::where('formdata_22s_id_fk', '=', $this->cid)->get();
        // dd($partisipanceData);
        return view('livewire.forms22.headers', [
            'headerdata' => $headerdata, 'projectData' => $projectData, 'topicData' => $topicData,'partisipanceData'=>$partisipanceData
        ]);
    }



    public function OpenAddCountryModal()
    {
        $this->contractor_name = '';
        $this->faculty_name = '';
        $this->ehsind_dt = Carbon::now()->format('Y-m-d') . " " . Carbon::now()->format('H:i:s');

        $this->iproject_id_fk = '';
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

            'iproject_id_fk' => $this->iproject_id_fk,
            'ehsind_dt' => $this->ehsind_dt,
            'venue' => $this->venue,
            'duration' => $this->duration,
            'topic_discusseds_ids' => implode(',', $this->topic_discusseds_ids),
            'faculty_sign' => $this->faculty_sign,
            'site_safety_in_charge_sign' => $this->site_safety_in_charge_sign,
            'site_safety_in_charge_name' => $this->site_safety_in_charge_name
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($formdata_22s_id, $role = 'Staff')
    {
        $info = formdata_22_header::find($formdata_22s_id);
        $partisipanceData = formdata_22_participant::where('formdata_22s_id_fk', '=', $formdata_22s_id)->get()[0];

        $this->partisipanceId = $partisipanceData->formdata_22_participants_id;
        $this->id_no = explode(',', $partisipanceData->age);
        // $this->desgination = explode(',', $partisipanceData->desgination);
        // $this->id_no = explode(',', $partisipanceData->id_no);
        // $this->participant_name = explode(',', $partisipanceData->participant_name);


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
        $this->iproject_id_fk = $info->iproject_id_fk;

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

            'iproject_id_fk' => $this->iproject_id_fk,
            'ehsind_dt' => $this->ehsind_dt,
            'venue' => $this->venue,
            'duration' => $this->duration,
            'topic_discusseds_ids' => implode(',', $this->topic_discusseds_ids),
            'faculty_sign' => $this->faculty_sign,
            'site_safety_in_charge_sign' => $this->site_safety_in_charge_sign,
            'site_safety_in_charge_name' => $this->site_safety_in_charge_name
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
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

    public function openParticipantsModel($id){
        session(['partisipanceId'=>$id]);
        // dd(url()->previous());
        return redirect('form22_participant')->with('goTo','headerToPartisipance');
        // dd($id);
    }
}
