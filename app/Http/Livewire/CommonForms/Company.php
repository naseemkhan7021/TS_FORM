<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\Company as Formscompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Company extends Component
{
    use WithFileUploads;

    protected $listeners = ['delete'];


    public $showimg, $searchQuery, $sbc_logo_small_path, $sbc_logo_large_path;
    public $sbc_company_name, $sbc_abbr, $sbc_logo_small, $sbc_logo_large, $validupto_dt;
    public $cid, $upd_sbc_company_name, $upd_sbc_abbr,$old_sbc_logo_small, $upd_sbc_logo_small, $upd_sbc_logo_large, $old_sbc_logo_large,$upd_validupto_dt,$userID;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
        $this->userID = Auth::user()->id;
    }

    public function render()
    {

        # render with search query
        $formsCompany = Formscompany::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('sbc_company_name', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('sbc_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('ibc_id')->get();

        return view('livewire.common-forms.company', [
            'formsCompany' => $formsCompany
        ]);
    }


    public function OpenAddCountryModal()
    {
        $this->sbc_company_name = '';
        $this->sbc_abbr = '';
        $this->validupto_dt = '';
        $this->sbc_logo_small = '';
        $this->sbc_logo_large = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }

    public function save()
    {
        # save
        $this->validate([
            'sbc_company_name' => 'required',
            'sbc_abbr' => 'required',
            'validupto_dt' => 'required',

        ]);

        $save = Formscompany::insert([
            'sbc_abbr' => $this->sbc_abbr,
            'sbc_company_name' => $this->sbc_company_name,
            'validupto_dt' => $this->validupto_dt,
            'sbc_logo_small' => $this->sbc_logo_small_path,
            'sbc_logo_large' => $this->sbc_logo_large_path,

            'user_created' => $this->userID,
        ]);

        if ($save) {

            // clear variable value
            $this->sbc_logo_small_path = '';
            $this->sbc_logo_large_path = '';
            $this->sbc_logo_small = '';
            $this->sbc_logo_large = '';

            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($ibc_id)
    {
        $info = Formscompany::find($ibc_id);

        $this->upd_sbc_company_name = $info->sbc_company_name;
        $this->upd_sbc_abbr = $info->sbc_abbr;
        $this->upd_validupto_dt = $info->validupto_dt;
        $this->old_sbc_logo_small = $info->sbc_logo_small;
        $this->old_sbc_logo_large = $info->sbc_logo_large;
        // if user not update any of ( small or large ) img teck form here
        $this->sbc_logo_small_path = $info->sbc_logo_small;
        $this->sbc_logo_large_path = $info->sbc_logo_large;

        $this->cid = $info->ibc_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'ibc_id' => $ibc_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_sbc_company_name' => 'required',
            'upd_sbc_abbr' => 'required',
            'upd_validupto_dt' => 'required',

        ], [
            'upd_sbc_company_name.required' => 'Enter subactivity description',
            'upd_sbc_abbr.required' => 'subactivity Abbrivation require',
            'upd_validupto_dt.required' => 'valide date require',
        ]);

        $update = Formscompany::find($cid)->update([
            'sbc_company_name' => $this->upd_sbc_company_name,
            'sbc_abbr' => $this->upd_sbc_abbr,
            'validupto_dt' => $this->upd_validupto_dt,
            'sbc_logo_small' => $this->sbc_logo_small_path,
            'sbc_logo_large' => $this->sbc_logo_large_path,

            'user_updated' => $this->userID,
        ]);

        if ($update) {
            // clear variable value
            $this->sbc_logo_small_path = '';
            $this->sbc_logo_large_path = '';
            $this->sbc_logo_small = '';
            $this->sbc_logo_large = '';

            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($ibc_id)
    {
        # delete
        $info = Formscompany::find($ibc_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->sbc_company_name . '</string>',
            'id' => $ibc_id
        ]);
    }

    public function delete($ibc_id)
    {
        $del =  Formscompany::find($ibc_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }

    // funtion to handle file upload small and large
    public function handelfileupload($log_small_or_large_path = null, $size_small_or_large = null,$edit=null)
    {
        // print_r($log_small_or_large_path);
        // handel small log
        // Get FileName
        $filenameWithExt = $log_small_or_large_path->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); // exp: exp.png
        //Get just extension
        $extension = $log_small_or_large_path->getClientOriginalExtension();
        //Filename to Store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        if ($size_small_or_large == 'small') {

            if ($edit=='edit' && Storage::disk()->exists($this->sbc_logo_small_path)) {
                // if exit then delete it
                Storage::delete($this->sbc_logo_small_path);
                // unlink("uploads/".$this->sbc_logo_small_path);
            }
            //small Image
            $this->sbc_logo_small_path = $log_small_or_large_path->storeAs('public/photos/logo/small', $fileNameToStore);
        }
        if ($size_small_or_large == 'large') {

            if ($edit=='edit' && Storage::disk()->exists($this->sbc_logo_large_path)) {
                Storage::delete($this->sbc_logo_large_path);
                // dd($this->sbc_logo_large_path);
            }
            //large Image
            $this->sbc_logo_large_path = $log_small_or_large_path->storeAs('public/photos/logo/large', $fileNameToStore);
        }
    }

    public function clearallValuesandValidation()
    {
        # validaton
        $this->resetValidation();
        # value
        $this->sbc_company_name = '';
        $this->sbc_logo_small = '';
        $this->sbc_logo_large = '';
        $this->sbc_logo_large_path = '';
        $this->sbc_logo_small_path = '';
        $this->sbc_abbr = '';
        $this->upd_sbc_abbr = '';
        $this->upd_sbc_company_name = '';
        $this->validupto_dt = '';
        $this->upd_validupto_dt ='';
    }
}
