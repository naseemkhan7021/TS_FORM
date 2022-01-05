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
if ($date_of_refilling) {
    # code...
    $this->due_for_next_refilling = Carbon\Carbon::parse($date_of_refilling)
        ->addYear() //addDay(364)
        ->format('Y-m-d');
        // dd($this->due_for_next_refilling);
}
if ($date_of_inspection) {
    # code...
    $this->due_for_next_inspection = Carbon\Carbon::parse($date_of_inspection)
        ->addMonths()
        ->format('Y-m-d');
}
@endphp


<div>
    @php $button_title = 'Add New INSPECTION' @endphp
    @php $data_not_found = 'No INSPECTIONS Data Found' @endphp


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
        <table class="table display table-bordered data-table" style="width:110%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>Name Of Responsible Person</th>
                    <th>Date Of Refilling</th>
                    <th>Date Of Inspection</th>
                    <th>Due For Next Refilling</th>
                    <th>Due For Next Inspection</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $form18Data as  $row )
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $row->sproject_name }}</td>
                        <td>{{ $row->name_of_responsible_person }}</td>
                        {{-- date format d-M-Y -->  26(number day)-Dec(char moth)-2021 --}}
                        <td>{{ Carbon\Carbon::parse($row->date_of_refilling)->format('d-M-Y') }}</td> 
                        <td>{{ Carbon\Carbon::parse($row->date_of_inspection)->format('d-M-Y')  }}</td>
                        <td>{{ Carbon\Carbon::parse($row->due_for_next_refilling)->format('d-M-Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($row->due_for_next_inspection)->format('d-M-Y')  }}</td>
                        <td>{{ $row->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm"
                                    wire:click="OpenEditCountryModal({{ $row->formdata_18s_id }})">Edit</button>
                                <button class="btn btn-danger btn-sm"
                                    wire:click="deleteConfirm({{ $row->formdata_18s_id }})">Delete</button>
    
                            </div>
                        </td>
    
                    </tr>
    
                @empty
                    <tr>
                        <td colspan="9">'{{ $data_not_found }}</td>
                    </tr>
                @endforelse
    
            </tbody>
        </table>
    </div>

    {{-- @if (count($form18Data))
        {{ $form18Data->links('livewire-pagination-links') }}
    @endif --}}

    @include('forms.Forms_18.formsdata18.add-modal')
    @include('forms.Forms_18.formsdata18.edit-modal')

</div>
