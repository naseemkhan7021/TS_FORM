<?php

namespace App\Http\Livewire\Forms22;

use App\Models\forms_22\formdata_22_header;
use App\Models\forms_22\formdata_22_participant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Participants extends Component
{
    protected $listeners = ['delete','selectedProjectID'];
    public $searchQuery, $role;
    public $participant_name, $age, $desgination, $signature, $id_no, $formdata_22s_id_fk;
    public $header_ehsind_dt;
    public $cid, $totalNumberOfParticipant,$OpenModelAuto,$userID;

    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }
    public function mount()
    {
        $this->searchQuery = '';
        $this->totalNumberOfParticipant = 1;
        $this->OpenModelAuto = false;
        $this->age = collect();
        $this->desgination = collect();
        $this->id_no = collect();
        $this->participant_name = collect();

        $this->userID = Auth::user()->id;

    }

    public function render()
    {
        $participantsdata = formdata_22_participant::join('formdata_22_headers', 'formdata_22_headers.formdata_22s_id', '=', 'formdata_22_participants.formdata_22s_id_fk')
            ->join('projects', 'projects.iproject_id', '=', 'formdata_22_headers.iproject_id_fk')
            ->where(['formdata_22_participants.bactive' => '1', 'formdata_22_participants.user_created' => $this->userID])
            ->when(session('globleSelectedProjectID') && session('globleSelectedProjectID') != '*', function ($data) {
                # code...
                $data->where('iproject_id_fk', '=', session('globleSelectedProjectID'))
                    ->where(['formdata_22_participants.bactive' => '1', 'formdata_22_participants.user_created' => $this->userID]);
            })
            ->when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('participant_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('age', 'like', '%' . $this->searchQuery . '%');
            })->get();
        $form22HeadData = formdata_22_header::where(['bactive'=> '1','user_created'=>$this->userID])->get();
        
        return view('livewire.forms22.participants', [
            'participantsdata' => $participantsdata, 'form22HeadData' => $form22HeadData
        ]);
    }



    public function OpenAddCountryModal()
    {
        $this->participant_name = [];
        $this->age = [];
        // $this->signature=[];
        $this->totalNumberOfParticipant = 1;
        $this->formdata_22s_id_fk = '';
        $this->desgination = [];
        $this->id_no = [];
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'participant_name' => 'required',
            'age' => 'required',
            'formdata_22s_id_fk' => 'required',
            'desgination' => 'required',
            'id_no' => 'required',
            'totalNumberOfParticipant' => 'required',
        ]);

        // dd($this->participant_name,$this->age,$this->formdata_22s_id_fk,$this->desgination,$this->id_no);

        $save = formdata_22_participant::insert([
            'participant_name' => implode(',', $this->participant_name),
            'age' => implode(',', $this->age),
            // 'signature'=>$this->signature,
            'formdata_22s_id_fk' => $this->formdata_22s_id_fk,
            'totalNumberOfParticipant' => $this->totalNumberOfParticipant,
            'desgination' => implode(',', $this->desgination),
            'id_no' => implode(',', $this->id_no),

            'user_created' => $this->userID,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($formdata_22_participants_id, $role = 'Staff')
    {
        $info = formdata_22_participant::find($formdata_22_participants_id);

        $this->role = $role;

        $this->participant_name = explode(',', $info->participant_name);
        $this->age = explode(',', $info->age);
        $this->signature = $info->signature;
        $this->formdata_22s_id_fk = $info->formdata_22s_id_fk;
        $this->totalNumberOfParticipant = $info->totalNumberOfParticipant;
        $this->desgination = explode(',', $info->desgination);
        $this->id_no = explode(',', $info->id_no);

        
        $this->cid = $info->formdata_22_participants_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_22_participants_id' => $formdata_22_participants_id,
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'participant_name' => 'required',
            'age' => 'required',
            'formdata_22s_id_fk' => 'required',
            'desgination' => 'required',
            'id_no' => 'required',
            'totalNumberOfParticipant' => 'required',
        ]);

        $update = formdata_22_participant::find($cid)->update([
            'participant_name' => implode(',', $this->participant_name),
            'age' => implode(',', $this->age),

            // 'signature'=>$this->signature,
            'totalNumberOfParticipant' => $this->totalNumberOfParticipant,
            'formdata_22s_id_fk' => $this->formdata_22s_id_fk,
            'desgination' => implode(',', $this->desgination),
            'id_no' => implode(',', $this->id_no),

            'user_updated' => $this->userID,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($formdata_22_participants_id)
    {
        $info = formdata_22_participant::find($formdata_22_participants_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->participant_name . '</strong>',
            'id' => $formdata_22_participants_id
        ]);
    }



    public function delete($formdata_22_participants_id)
    {
        $del =  formdata_22_participant::find($formdata_22_participants_id)->delete();
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

    public function addParticipant()
    {
        # code...
        ++$this->totalNumberOfParticipant;
    }
    public function removeParticipant($index)
    {
        # code...
        array_splice($this->participant_name, $index, 1);
        array_splice($this->age, $index, 1);
        array_splice($this->desgination, $index, 1);
        array_splice($this->id_no, $index, 1);
        --$this->totalNumberOfParticipant;
    }

    public function openModalRD()
    {

        // dd(session('goTo'));
        # code...
        if (session('partisipanceId') && $this->OpenModelAuto) {
            # code...
            // dd(session('partisipanceId'));
            $id=session('partisipanceId');
            $this->OpenEditCountryModal($id);
            // dd(url()->previous())
        }
        // $this->emit('show');
    }
}
