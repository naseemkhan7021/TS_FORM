<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\Dept_Default_Docs;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentsAll extends Component
{
    use WithPagination;
    protected $listeners = ['delete'];
    public $searchQuery;
    public $document_name,$document_code;
    public $cid;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    { 
        // this is document serialnumber 
        # render with search query
        $allDocuments = Dept_Default_Docs::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('document_name', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('document_code', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('ddd_id', 'asc')->paginate(15);

        return view('livewire.common-forms.documents-all', [
            'allDocuments' => $allDocuments
        ]);
    }



    public function OpenAddCountryModal(){
        $this->document_name = '';
        $this->document_code = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        # save
        $this->validate([
            'document_name' => 'required',
            'document_code' => 'required',
        ], [
            'document_name.required' => 'Enter Description Required'  ,
            'document_code.required' => 'Revision Date Required',
        ]);

        $save = Dept_Default_Docs::insert([
            'document_name' => $this->document_name,
            'document_code' => $this->document_code,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($ddd_id)
    {
        # code...
        $info = Dept_Default_Docs::find($ddd_id);
        $this->document_name = $info->document_name;
        $this->document_code = $info->document_code;

        $this->cid = $info->ddd_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'ddd_id' => $ddd_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'document_name' => 'required',
            'document_code' => 'required',
        ], [
            'document_name.required' => 'Enter Description Required'  ,
            'document_code.required' => 'Revision Date Required',
        ]);

        $update = Dept_Default_Docs::find($cid)->update([
            'document_name' => $this->document_name,
            'document_code' => $this->document_code,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($ddd_id)
    {
        # delete
        $info = Dept_Default_Docs::find($ddd_id);
        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->document_name . '</string>',
            'id' => $ddd_id
        ]);
    }

    public function delete($ddd_id)
    {
        $del =  Dept_Default_Docs::find($ddd_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}