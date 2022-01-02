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
// if ($date_of_refilling) {
//     # code...
//     $this->due_for_next_refilling = Carbon\Carbon::parse($date_of_refilling)
//         ->addYear() //addDay(364)
//         ->format('Y-m-d');
//         // dd($this->due_for_next_refilling);
// }
// if ($date_of_inspection) {
//     # code...
//     $this->due_for_next_inspection = Carbon\Carbon::parse($date_of_inspection)
//         ->addMonths()
//         ->format('Y-m-d');
// }
@endphp


<div>
    @php $button_title = 'Add New OBSERVATION' @endphp
    @php $data_not_found = 'No OBSERVATION Data Found' @endphp


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


    <table class="table display table-bordered data-table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Observation</th>
                <th>Noticed Time (24H)</th>
                <th>Recommend Corrective Action</th>
                <th>Location</th>
                <th>Prioritytimescales</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $form28Data as  $row )
                <tr>
                    <td>{{ $form28Data->firstItem()+$loop->index }}</td>
                    <td>{{ $row->sproject_name }}</td>
                    <td>{{ $row->observation_desc }}</td>
                    <td>{{ $row->noticed_time }}</td>
                    <td>{{ $row->recommend_corrective_action }}</td>
                    <td>{{ $row->location }}</td>
                    <td>{{ $row->prioritytimescales_desc }}</td>
                    <td>{{ Carbon\Carbon::parse($row->form28Creat)->format(env('DATE_FORMAT_YMD')) }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm"
                                wire:click="OpenEditCountryModal({{ $row->formdata_28s_id }})">Edit</button>
                            <button class="btn btn-danger btn-sm"
                                wire:click="deleteConfirm({{ $row->formdata_28s_id }})">Delete</button>
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

    @if (count($form28Data))
        {{ $form28Data->links('livewire-pagination-links') }}
    @endif

    @include('forms.Forms_28.formdata28.add-modal')
    @include('forms.Forms_28.formdata28.edit-modal')

</div>
