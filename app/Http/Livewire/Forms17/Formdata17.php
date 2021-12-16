<?php

namespace App\Http\Livewire\Forms17;

use App\Models\forms_16\formdata_16;
use App\Models\forms_16\uploaddocument;
use App\Models\forms_17\formdata_17;
use App\Models\forms_17\substandaction;
use App\Models\forms_17\substandcondition;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Formdata17 extends Component
{

    use WithFileUploads;

    public $inv_photos=[],$inv_imgTitles = [], $searchQuery,$role,$injury_to_f16,$eml_id_no_f16,$designation_f16,$doincident_dt_f16, $potential_injurytos_other_f16;
    public$substandcondition_ids,$substandaction_ids, $substandaction_id_fk, $incident_description, $coworker_statement,$formdata_16s_id_fk,$concernedsupervisor_statement,$root_cause,$remedial_actions,$comment_remedial_actions,$site_safety_in_charge_name,$site_safety_in_charge_signature,$project_manager,$project_manager_signature;
    public $upd_substandcondition_ids,$upd_substandaction_ids;
    public $cid,$inv_oldimgTitles=[],$oldphotosLocation=[];

    public function mount()
    {
        $this->searchQuery = '';
        $this->substandcondition_ids = collect();
        $this->substandaction_ids = collect();
    }

    public function render()
    {
        
        $form17data = formdata_17::join('formdata_16s', 'formdata_16s.formdata_16s_id', '=', 'formdata_17s.formdata_16s_id_fk')
        ->join('potential_injurytos', 'potential_injurytos.potential_injurytos_id', '=', 'formdata_16s.potential_injurytos_fk')
        ->when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('incident_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('coworker_statement', 'like', '%' . $this->searchQuery . '%');
        })
            ->orderBy('formdata_17s_id')->paginate(10);
        // dd($form17data);

        $form16data=formdata_16::where('bactive', '1')->get();
        $substandactiondata=substandaction::all();
        $substandconditiondata=substandcondition::all();
        return view('livewire.forms17.formdata17',[
            'form17data'=>$form17data,'form16data'=>$form16data,'substandconditiondata'=>$substandconditiondata,'substandactiondata'=>$substandactiondata
        ]);
    }

    
    public function OpenAddCountryModal()
    {
        $this->incident_description = '';
        $this->coworker_statement = '';
        $this->formdata_16s_id_fk = '';
        $this->substandaction_id_fk='';
        $this->concernedsupervisor_statement='';
        $this->root_cause='';
        $this->remedial_actions='';
        $this->comment_remedial_actions='';
        $this->site_safety_in_charge_name='';
        $this->site_safety_in_charge_signature='';
        $this->project_manager='';
        $this->project_manager_signature='';
        $this->substandcondition_ids=collect();
        $this->substandaction_ids=collect();
        
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'incident_description' => 'required',
            'coworker_statement' => 'required',

            // 'substandaction_id_fk'=>'required',
            'formdata_16s_id_fk'=>'required|not_in:0',
            'concernedsupervisor_statement'=>'required',
            'root_cause'=>'required',
            'remedial_actions'=>'required',
            'comment_remedial_actions'=>'required',
            'site_safety_in_charge_name'=>'required',
            'site_safety_in_charge_signature'=>'required',
            // 'project_manager'=>'required',
            // 'project_manager_signature'=>'required',
        ]);

        $save = formdata_17::insert([
            'incident_description' => $this->incident_description,
            'coworker_statement' => $this->coworker_statement,
            // 'substandaction_id_fk'=>$this->substandaction_id_fk,
            'formdata_16s_id_fk'=>$this->formdata_16s_id_fk,
            'substandaction_ids'=> implode(',',$this->substandaction_ids),
            'substandcondition_ids'=> implode(',',$this->substandcondition_ids),
            'concernedsupervisor_statement'=>$this->concernedsupervisor_statement,
            'root_cause'=>$this->root_cause,
            'remedial_actions'=>$this->remedial_actions,
            'comment_remedial_actions'=>$this->comment_remedial_actions,
            'site_safety_in_charge_name'=>$this->site_safety_in_charge_name,
            'site_safety_in_charge_signature'=>$this->site_safety_in_charge_signature,
            // 'project_manager'=>$this->project_manager,
            // 'project_manager_signature'=>$this->project_manager_signature,
        ]);
        $this->resetValidation();
        $id = DB::getPdo()->lastInsertId(); // finding last id
        if ($save) {
            if (count($this->inv_photos) > 0) {
                # code...
                //Handle File Upload
                $investigationImgsName = [];
                $investigationImgsLocation = [];
                foreach ($this->inv_photos as $key => $file) {
                    // Get FileName
                    $filenameWithExt = $file->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); // exp: exp.png
                    //Get just extension
                    $extension = $file->getClientOriginalExtension();
                    //Filename to Store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    //Upload Image
                    $path = $file->storeAs('public/photos/investigationDoc', $fileNameToStore);
                    // D:\xampp\htdocs\naseem_tsforms\storage\app\public\photos\injuredDoc
                    array_push($investigationImgsLocation, $path);
                    array_push($investigationImgsName, $fileNameToStore);
                }

                // store to database
                $uploaddocument = new uploaddocument();
                $uploaddocument->uploaddocuments_title = $this->inv_imgTitles;
                $uploaddocument->uploaddocuments_name = $investigationImgsName;
                $uploaddocument->uploaddocuments_location = $investigationImgsLocation;
                $uploaddocument->forms17_id = $id;
                $saveImage = $uploaddocument->save();

                if ($saveImage) {
                    # code...
                    // clear veriable 
                    $this->inv_photos = [];
                    $this->inv_imgTitles = array();
                    $this->dispatchBrowserEvent('CloseAddCountryModal');
                    $this->resetValidation();
                    return response()->json(array('success' => true, 'last_insert_id_imgs' => $uploaddocument->uploaddocuments_id, 'last_insert_id_form' => $id), 200);
                }
            } else {
                $this->dispatchBrowserEvent('CloseAddCountryModal');
                $this->resetValidation();
            }
        }
    }



    public function OpenEditCountryModal($formdata_17s_id ,$role = 'Staff')
    {
        $info = formdata_17::find($formdata_17s_id);

        $imgslist = uploaddocument::where('forms17_id', $formdata_17s_id)->get();
        // dd($imgslist);
        if (count($imgslist) > 0) {
            $imgs = $imgslist[0];
            # code...
            // img render
            $this->oldphotosLocation = $imgs->uploaddocuments_location;
            $this->inv_oldimgTitles = $imgs->uploaddocuments_title;
            $this->oldimgName = $imgs->uploaddocuments_name;

            // $this->imgTitles = $imgs->uploaddocuments_title;

            $this->imgsId = $imgs->uploaddocuments_id;
        } else {
            $this->oldphotosLocation = [];
            $this->inv_oldimgTitles = array();
            $this->oldimgName = [];   // img Name will remove after some time
        }

        // dd($info);
        $this->role = $role;

        $this->incident_description = $info->incident_description;
        $this->coworker_statement = $info->coworker_statement;

        $this->formdata_16s_id_fk=$info->formdata_16s_id_fk;
        $this->substandaction_id_fk=$info->substandaction_id_fk;
        $this->concernedsupervisor_statement=$info->concernedsupervisor_statement;
        $this->root_cause=$info->root_cause;
        $this->remedial_actions=$info->remedial_actions;
        $this->comment_remedial_actions=$info->comment_remedial_actions;
        $this->site_safety_in_charge_name=$info->site_safety_in_charge_name;
        $this->site_safety_in_charge_signature=$info->site_safety_in_charge_signature;
        $this->project_manager=$info->project_manager;
        $this->project_manager_signature=$info->project_manager_signature;
        $this->substandcondition_ids=explode(',',$info->substandcondition_ids);
        $this->substandaction_ids=explode(',',$info->substandaction_ids);

        // dd('substandcondition_ids => ',$this->upd_substandcondition_ids, ' substandaction_ids => ',$this->upd_substandaction_ids);

        $this->cid = $info->formdata_17s_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'formdata_17s_id' => $formdata_17s_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'incident_description' => 'required',
            'coworker_statement' => 'required'
        ], [

            'incident_description.required' => 'Enter incident Description',
            'coworker_statement.required' => 'coworker statement Abbrivation require'
        ]);

        $update = formdata_17::find($cid)->update([
            'incident_description' => $this->incident_description,
            'coworker_statement' => $this->coworker_statement,

            'formdata_16s_id_fk'=>$this->formdata_16s_id_fk ,
            'substandaction_id_fk'=>$this->substandaction_id_fk,
            'concernedsupervisor_statement'=>$this->concernedsupervisor_statement,
            'root_cause'=>$this->root_cause,
            'remedial_actions'=>$this->remedial_actions,
            'comment_remedial_actions'=>$this->comment_remedial_actions,
            'site_safety_in_charge_name'=>$this->site_safety_in_charge_name,
            'site_safety_in_charge_signature'=>$this->site_safety_in_charge_signature,
            'project_manager'=>$this->project_manager,
            'project_manager_signature'=>$this->project_manager_signature,
            'substandcondition_ids'=>implode(',',$this->substandcondition_ids),
            'substandaction_ids'=>implode(',',$this->substandaction_ids),
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }



    public function deleteConfirm($formdata_17s_id)
    {
        $info = formdata_17::find($formdata_17s_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->incident_description . '</strong>',
            'id' => $formdata_17s_id
        ]);
    }



    public function delete($formdata_17s_id)
    {
        $del =  formdata_17::find($formdata_17s_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    public function clearallValuesandValidation()
    {
        # validaton
        $this->resetValidation();
        # value
        $this->formdata_16s_id_fk = '';
    }

    public function removeImg($ind)
    {
        # code...
        # code...
        if ($ind >= 0) {
            # code...
            // array_splice(array, start, length, array)
            array_splice($this->inv_photos, $ind, 1);
            array_splice($this->inv_imgTitles, $ind, 1);
            // unset($this->photos[$photoIndx]);
        }
    }
}
