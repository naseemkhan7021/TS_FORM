@php
if ($iproject_id_fk) {
    # code...
    $sproject_location_obj = DB::table('projects')
        ->where('iproject_id', '=', $iproject_id_fk)
        ->get();
    $this->sproject_location = $sproject_location_obj[0]->sproject_location;
    $this->ibc_id_fk = $sproject_location_obj[0]->ibc_id_fk;
    $this->idepartment_id_fk = $sproject_location_obj[0]->idepartment_id_fk;
    
}
@endphp

<div>
    @php $button_title = 'Add New WORK PERMIT ' @endphp
    @php $data_not_found = 'No WORK PERMIT Data Found' @endphp


    <div class="row">
        <div class="col-sm-8">
            <div class="text-sm-left">
                <button class="btn btn-danger waves-effect waves-light mb-2" wire:click="OpenAddCountryModal()">
                    {{ $button_title }} </button>
                <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i
                        class="mdi mdi-cog"></i></button>
            </div>
        </div>
        <div class="col-md-4">
            <input wire:model="searchQuery" type="text" placeholder="Search..." class="form-control">
        </div>
    </div>
    <div class="overflow-auto">
        <table class="table display table-bordered data-table" style="width:100%">
            <thead>
                <tr align="center">
                    <th>#</th>
                    <th><div class="bg-gray-800">Project Name</div></th>
                    <th>parmitNo</th>
                    <th>Contractor Name</th>
                    <th>No Of People Working</th>
                    <th>Time of working <br> (From - To) </th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $formData35 as  $row )
                    <tr>
                        <td>{{ $formData35->firstItem() + $loop->index }}</td>
                        <td>{{ $row->sproject_name }}</td>
                        <td>{{ $row->parmitNo }}</td>
                        <td>{{ $row->contractor_name }}</td>
                        <td>{{ $row->no_of_people_working }}</td>
                        <td>{{ Carbon\Carbon::parse($row->working_t_F)->format(env('HIA')) }} to {{Carbon\Carbon::parse($row->working_t_T)->format(env('HIA')) }}</td>
                        <td>{{ Carbon\Carbon::parse($row->created_at)->format(env('DATE_FORMAT1')) }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="waves-effect waves-light btn btn-success btn-sm"
                                    wire:click="OpenEditCountryModal({{ $row->formdata_35s_id }})">Edit</button>
                                <button class="waves-effect waves-light btn btn-danger btn-sm"
                                    wire:click="deleteConfirm({{ $row->formdata_35s_id }})">Delete</button>
                                <button class="waves-effect waves-light btn btn-primary btn-sm"
                                    wire:click="ganaratePDF({{ $row->formdata_35s_id }})">pdf</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="15">'{{ $data_not_found }}</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    @if (count($formData35))
        {{ $formData35->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_35.formdata35.add-modal')
    @include('Forms.Forms_35.formdata35.edit-modal')

</div>
