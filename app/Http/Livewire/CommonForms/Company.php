<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\Company as Formscompany;
use Livewire\Component;

class Company extends Component
{

    public $searchQuery;
    public $sbc_company_name, $sbc_abbr, $sbc_logo_small ,$sbc_logo_large,$validupto_dt;
    public $cid, $upd_sbc_company_name, $upd_sbc_abbr, $upd_sbc_logo_small ,$upd_sbc_logo_large,$upd_validupto_dt;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {

        # render with search query
        $formsCompany = Formscompany::when($this->searchQuery != '', function ($query) {
                $query->where('bactive', '1')
                    ->where('sbc_company_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('sbc_abbr', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('ibc_id' )->get();

        return view('livewire.common-forms.company',[
            'formsCompany'=>$formsCompany
        ]);
    }


    public function OpenAddCountryModal(){
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
            'sbc_logo_small'=>'required',
            'sbc_logo_large'=>'required',
        ]);

        $save = Formscompany::insert([
            'sbc_abbr' => $this->sbc_abbr,
            'sbc_company_name' => $this->sbc_company_name,
            'validupto_dt' => $this->validupto_dt,
            'sbc_logo_small' => $this->sbc_logo_small,
            'sbc_logo_large' => $this->sbc_logo_large,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($ibc_id)
    {
        # code...
        $info = Formscompany::find($ibc_id);

        $this->upd_sbc_company_name = $info->sbc_company_name;
        $this->upd_sbc_abbr = $info->sbc_abbr;
        $this->upd_validupto_dt = $info->validupto_dt;
        $this->upd_sbc_logo_small = $info->sbc_logo_small;
        $this->upd_sbc_logo_large = $info->sbc_logo_large;
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
            'upd_sbc_logo_small' => 'required',
            'upd_sbc_logo_large' => 'required',
        ], [
            'upd_sbc_company_name.required' => 'Enter subactivity description',
            'upd_sbc_abbr.required' => 'subactivity Abbrivation require',
            'upd_validupto_dt.required' => 'valide date require',
        ]);

        $update = Formscompany::find($cid)->update([
            'sbc_company_name' => $this->upd_sbc_company_name,
            'sbc_abbr' => $this->upd_sbc_abbr,
            'validupto_dt' => $this->upd_validupto_dt,
            'sbc_logo_small' => $this->upd_sbc_logo_small,
            'sbc_logo_large' => $this->upd_sbc_logo_large,
        ]);

        if ($update) {
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
}
