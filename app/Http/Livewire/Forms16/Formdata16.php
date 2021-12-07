<?php

namespace App\Http\Livewire\Forms16;

use App\Models\common\Gender;
use App\Models\forms_16\formdata_16;
use App\Models\projcon\Project;
use Livewire\Component;

class Formdata16 extends Component
{
    public $searchQuery;
    public $injuredvictim_name, $designation,$age;
    public $cid, $upd_injuredvictim_name, $upd_designation,$upd_age;




    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $form16data = formdata_16::join('companies','companies.ibc_id','=','formdata_16s.ibc_id_fk')
        // ->join('defaultdatas','defaultdatas.idefault_id','=','formdata_16s.idefault_id_fk')
        // ->join('companies','companies.ibc_id','=','formdata_16s.ibc_id_fk')
        // ->join('departments','departments.idepartment_id','=','formdata_16s.idepartment_id_fk')
        // ->join('documents','documents.document_id','=','formdata_16s.document_id_fk')
        ->join('potential_injurytos','potential_injurytos.potential_injurytos_id','=','formdata_16s.potential_injurytos_fk')
        // ->join('projects','projects.iproject_id','=','formdata_16s.iproject_id_fk')
        
        ->when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('injuredvictim_name', 'like', '%' . $this->searchQuery . '%')
                ->where('age', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('designation', 'like', '%' . $this->searchQuery . '%');
        })
            ->orderBy('formdata_16s_id')->paginate(10);

            $prjectData = Project::all();
            $genderData = Gender::all();

        return view('livewire.forms16.formdata16',[
            'form16data'=>$form16data,'prjectData'=>$prjectData,'genderData'=>$genderData
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->injuredvictim_name = '';
        $this->designation = '';
        $this->age = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'injuredvictim_name' => 'required',
            'age' => 'required',
            'designation' => 'required'
        ]);

        $save = formdata_16::insert([
            'injuredvictim_name' => $this->injuredvictim_name,
            'designation' => $this->designation,
            'age' => $this->age,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function OpenEditCountryModal($formdata_16s_id)
    {
        $info = formdata_16::find($formdata_16s_id);

        $this->upd_injuredvictim_name = $info->injuredvictim_name;
        $this->upd_designation = $info->designation;
        $this->upd_age = $info->age;
        $this->cid = $info->formdata_16s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_16s_id' => $formdata_16s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'upd_injuredvictim_name' => 'required',
            'upd_designation' => 'required',
            'upd_age' => 'required'
        ], [

            'upd_injuredvictim_name.required' => 'Enter injured victim name'
        ]);

        $update = formdata_16::find($cid)->update([
            'injuredvictim_name' => $this->upd_injuredvictim_name,
            'age' => $this->upd_age,
            'designation' => $this->upd_designation
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($formdata_16s_id)
    {
        $info = formdata_16::find($formdata_16s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->injuredvictim_name . '</strong>',
            'id' => $formdata_16s_id
        ]);
    }



    public function delete($formdata_16s_id)
    {
        $del =  formdata_16::find($formdata_16s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
