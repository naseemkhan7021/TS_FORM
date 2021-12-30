<?php

namespace App\Http\Livewire\Forms66;

use App\Models\forms_66\OrganizationRequirements;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationRequirement extends Component
{
    use WithPagination;

    protected $listeners = ['delete'];
    public $searchQuery;
    public $organization_requirement_description, $organization_requirement_abbr, $organization_requirement_value, $organization_requirement_detail;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    {
        $organzationrequirementData = OrganizationRequirements::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('organization_requirement_description', 'like', '%' . $this->searchQuery . '%')
                ->where('organization_requirement_value', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('organization_requirement_abbr', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('organization_requirement_id', 'asc')->paginate(10);

        return view('livewire.forms66.organization-requirement', ['organzationrequirementData' => $organzationrequirementData]);
    }


    public function OpenAddCountryModal()
    {
        $this->organization_requirement_description = '';
        $this->organization_requirement_value = '';
        $this->organization_requirement_abbr = '';
        $this->organization_requirement_detail = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        $this->validate([
            'organization_requirement_description' => 'required',
            'organization_requirement_value' => 'required',
            'organization_requirement_detail' => 'required',
            'organization_requirement_abbr' => 'required'
        ]);

        $save = OrganizationRequirements::insert([
            'organization_requirement_description' => $this->organization_requirement_description,
            'organization_requirement_value' => $this->organization_requirement_value,
            'organization_requirement_detail' => $this->organization_requirement_detail,
            'organization_requirement_abbr' => $this->organization_requirement_abbr,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseAddCountryModal');
            // $this->checkedCountry = [];
        }
    }


    // update 
    public function OpenEditCountryModal($organization_requirement_id)
    {
        $info = OrganizationRequirements::find($organization_requirement_id);

        $this->organization_requirement_description = $info->organization_requirement_description;
        $this->organization_requirement_value = $info->organization_requirement_value;
        $this->organization_requirement_detail = $info->organization_requirement_detail;
        $this->organization_requirement_abbr = $info->organization_requirement_abbr;
        $this->cid = $info->organization_requirement_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'organization_requirement_id' => $organization_requirement_id
        ]);
    }



    public function update()
    {
        $cid = $this->cid;
        $this->validate([
            'organization_requirement_description' => 'required',
            'organization_requirement_value' => 'required',
            'organization_requirement_detail' => 'required',
            'organization_requirement_abbr' => 'required'
        ]);

        $update = OrganizationRequirements::find($cid)->update([
            'organization_requirement_description' => $this->organization_requirement_description,
            'organization_requirement_value' => $this->organization_requirement_value,
            'organization_requirement_detail' => $this->organization_requirement_detail,
            'organization_requirement_abbr' => $this->organization_requirement_abbr
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
            // $this->checkedCountry = [];
        }
    }

    // delete 
    public function deleteConfirm($organization_requirement_id)
    {
        $info = OrganizationRequirements::find($organization_requirement_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <strong>' . $info->organization_requirement_description . '</strong>',
            'id' => $organization_requirement_id
        ]);
    }



    public function delete($organization_requirement_id)
    {
        $del =  OrganizationRequirements::find($organization_requirement_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
