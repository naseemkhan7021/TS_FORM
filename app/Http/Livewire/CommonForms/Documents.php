<?php

namespace App\Http\Livewire\CommonForms;

use App\Models\common_forms\Documents as Formsdocuments;
use Livewire\Component;

class Documents extends Component
{
    public $searchQuery;
    public $document_description, $issue_no, $issue_dt,$revision_no,$revision_date;
    public $cid, $upd_document_description, $upd_issue_no, $upd_issue_dt,$upd_revision_no,$upd_revision_date;

    public function mount()
    {
        # on mound
        $this->searchQuery = '';
    }

    public function render()
    { 
        // this is document serialnumber 
        # render with search query
        $formsDocuments = Formsdocuments::when($this->searchQuery != '', function ($query) {
            $query->where('bactive', '1')
                ->where('document_description', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('issue_no', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('issue_dt', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('revision_no', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('revision_date', 'like', '%' . $this->searchQuery . '%');
        })->get();

        return view('livewire.common-forms.documents', [
            'formsDocuments' => $formsDocuments
        ]);
    }



    public function OpenAddCountryModal(){
        $this->document_description = '';
        $this->issue_no = '';
        $this->issue_dt = '';
        $this->revision_date = '';
        $this->revision_no = '';
        $this->dispatchBrowserEvent('OpenAddCountryModal');
    }


    public function save()
    {
        # save
        $this->validate([
            'document_description' => 'required',
            'issue_no' => 'required',
            'issue_dt' => 'required',
            'revision_date' => 'required',
            'revision_no' => 'required',
        ]);

        $save = Formsdocuments::insert([
            'issue_no' => $this->issue_no,
            'document_description' => $this->document_description,
            'issue_dt' => $this->issue_dt,
            'revision_date' => $this->revision_date,
            'revision_no' => $this->revision_no,
        ]);

        if ($save) {
            # code...
            $this->dispatchBrowserEvent('CloseAddCountryModal');
        }
    }

    public function OpenEditCountryModal($document_id)
    {
        # code...
        $info = Formsdocuments::find($document_id);

        $this->upd_document_description = $info->document_description;
        $this->upd_issue_no = $info->issue_no;
        $this->upd_issue_dt = $info->issue_dt;
        $this->upd_revision_no = $info->revision_no;
        $this->upd_revision_date = $info->revision_date;
        $this->cid = $info->document_id;
        $this->dispatchBrowserEvent('OpenEditCountryModal', [
            'document_id' => $document_id
        ]);
    }

    public function update()
    {
        # update method
        $cid = $this->cid;
        $this->validate([
            'upd_document_description' => 'required',
            'upd_issue_no' => 'required',
            'upd_issue_dt' => 'required',
            'upd_revision_date' => 'required',
            'upd_revision_no' => 'required',
        ], [
            'upd_document_description.required' => 'Enter Description Required'  ,
            'upd_issue_no.required' => 'Issue No Required',
            'upd_issue_dt.required' => 'Issue Date Required',
            'upd_revision_date.required' => 'Revision Date Required',
            'upd_revision_no.required' => 'Revision No. Required',
        ]);

        $update = Formsdocuments::find($cid)->update([
            'document_description' => $this->upd_document_description,
            'issue_no' => $this->upd_issue_no,
            'issue_dt' => $this->upd_issue_dt,
            'revision_date' => $this->upd_revision_date,
            'revision_no' => $this->upd_revision_no,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCountryModal');
        }
    }

    public function deleteConfirm($document_id)
    {
        # delete
        $info = Formsdocuments::find($document_id);

        $this->dispatchBrowserEvent('SwalConfirm', [
            'titel' => 'Are you sure ?',
            'html' => 'You want to delete <strong>' . $info->document_description . '</string>',
            'document_id' => $document_id
        ]);
    }

    public function delete($document_id)
    {
        $del =  Formsdocuments::find($document_id)->delete();
        if ($del) {
            $this->dispatchBrowserEvent('delete');
        }
        // $this->checkedCountry = [];
    }
}
