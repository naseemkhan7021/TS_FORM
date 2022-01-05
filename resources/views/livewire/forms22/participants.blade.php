@php
if ($formdata_22s_id_fk) {
    # code...
    $form22head_obj = DB::table('formdata_22_headers')
        ->where('formdata_22s_id', '=', $formdata_22s_id_fk)
        ->get();
    $this->header_ehsind_dt = $form22head_obj[0]->ehsind_dt;
}
@endphp


<div>
    @php $button_title = 'Add New Header' @endphp
    @php $data_not_found = 'No Headers Data Found' @endphp


    <div class="row">
        <div class="col-sm-8">
            <div class="text-sm-left">
                <button class="btn btn-danger waves-effect waves-light mb-2" wire:click="OpenAddCountryModal()"> {{ $button_title }} </button>
                <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
            </div>
        </div>
        <div class="col-md-4">
            <input wire:model="searchQuery" type="text" placeholder="Search..." class="form-control" >
        </div>
    </div>
    <div class="overflow-auto">
    <table class="table display table-bordered data-table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Total Participant</th>
                <th>Age</th>
                <th>Desgination</th>
                <th>Date/Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $participantsdata  as  $row )
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $row->sproject_name  }}</td>
                    <td>{{ count(explode(',',$row->participant_name)) }}</td>
                    <td>{{ $row->age  }}</td>
                    <td>{{ $row->desgination  }}</td>
                    <td> {{Carbon\Carbon::parse($row->ehsind_dt)->diffForHumans()}}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->formdata_22_participants_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->formdata_22_participants_id}})">Delete</button>
                        </div>
                    </td>
                </tr>

            @empty
                <tr><td colspan="7">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    </div>
    @include('Forms.Forms_22.participant.add-modal')
    @include('Forms.Forms_22.participant.edit-modal')

</div>
