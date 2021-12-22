<?php

namespace App\Http\Livewire\Forms00;

use Livewire\Component;
use App\models\forms_00\formdata_00;

class Formdata00 extends Component
{

    protected $listeners = ['selectedProjectID'];
    public $searchQuery,$selectedProjectID;

    public function selectedProjectID($id)
    {
        # code...
        $this->selectedProjectID = $id;
    }

    public function mount()
    {
        $this->searchQuery = '';
        // $this->selectedProjectID = 1;
    }


    public function render()
    {

        $formdata00 = formdata_00::join('companies','companies.ibc_id','=','formdata_00s.ibc_id_fk')
            ->join('departments','departments.idepartment_id','=','formdata_00s.idepartment_id_fk')
            ->join('documents','documents.document_id','=','formdata_00s.document_id_fk')
            ->join('projects','projects.iproject_id','=','formdata_00s.iproject_id_fk')
            ->where('formdata_00s.iproject_id_fk', session('globleSelectedProjectID'))
            ->when($this->searchQuery != '', function ($query) {
                $query->where('formdata_00s.bactive', '1')
                    ->where('document_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('document_code', 'like', '%' . $this->searchQuery . '%');
            })
            ->orderBy('sr_no')->get();



        return view('livewire.forms00.formdata00' , [
            'formdata00' => $formdata00 ,
        ]);
    }



    public function OpenAddCountryModal()
    {
        $this->document_name = '';
        $this->document_code = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'document_name' => 'required',
            'document_code' => 'required'
        ]);

        $save = formdata_00::insert([
            'document_name' => $this->document_name,
            'document_code' => $this->document_code,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($formdata_00s_id)
    {
        $info = formdata_00::find($formdata_00s_id);

        $this->upd_document_name = $info->document_name;
        $this->upd_document_code = $info->document_code;
        $this->cid = $info->formdata_00s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_00s_id' => $formdata_00s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_document_name' => 'required',
            'upd_document_code' => 'required'
        ], [

            'upd_document_name.required' => 'Enter Activity Description',
            'upd_document_code.required' => 'Activity Abbrivation require'
        ]);

        $update = formdata_00::find($cid)->update([
            'document_name' => $this->upd_document_name,
            'document_code' => $this->upd_document_code
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($formdata_00s_id)
    {
        $info = formdata_00::find($formdata_00s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->document_name . '</strong>',
            'id' => $formdata_00s_id
        ]);
    }



    public function delete($formdata_00s_id)
    {
        $del =  formdata_00::find($formdata_00s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }





}
