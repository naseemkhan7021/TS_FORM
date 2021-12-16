@php
if ($formdata_16s_id_fk) {
    # code...
    $form16_obj = DB::table('formdata_16s')
        ->where('formdata_16s_id', '=', $formdata_16s_id_fk)->join('potential_injurytos', 'potential_injurytos.potential_injurytos_id', '=', 'formdata_16s.potential_injurytos_fk')
        ->get();
    $doincident_dt_f16 = $form16_obj[0]->doincident_dt;
    $designation_f16 = $form16_obj[0]->designation;
    $eml_id_no_f16 = $form16_obj[0]->eml_id_no;
    $injury_to_f16 = $form16_obj[0]->potential_injurytos_description;
    $potential_injurytos_other_f16=$form16_obj[0]->potential_injurytos_other;
    // dd($this->injury_to_f16);
}
// if ($dob_dt) {
    # code...
    # procedural
    // $this->age = date_diff(date_create($dob_dt), date_create('today'))->y;
    // echo 'this is => ' . now();
// }
@endphp

<div>
    @php $button_title = 'Add New Form-17' @endphp
    @php $data_not_found = 'No Data Found' @endphp

    <div class="row">
        <div class="col-sm-8">
            <div class="text-sm-left">
                <button title="{{$button_title}}" class="btn btn-danger waves-effect waves-light mb-2" wire:click="OpenAddCountryModal()"> {{ $button_title }} </button>
                <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
            </div>
        </div>
        <div class="col-md-4">
            <input wire:model="searchQuery" type="text" placeholder="Search..." class="form-control" >
        </div>
    </div>

    <table class="table display table-bordered data-table text-center" style="width:100%">
        <thead>
            <tr>
                <th >#</th>
                <th>Date of Investigation / Time</th>
                <th>Date of Incident / Time</th>
                <th>Injured To</th>
                <th>Injured Victim Name</th>
                <th style="cursor: pointer"> <span class="cursor-pointer" title="To whom was the Incident Reported first">To whom</span></th>
                <th>By whom </th>
                <th>Was First Aid</th>
                {{-- <th>Incident Description</th>
                <th>Coworker Statement</th> --}}
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $form17data as  $row )
                <tr>
                    {{-- <td>{{ $row->formdata_17s_id }}</td> --}}
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $row->updated_at }}</td>
                    <td>{{Carbon\Carbon::parse($row->doincident_dt)->diffForHumans()}}</td>
                    {{-- <td>{{$row->doincident_dt}}</td> --}}
                    <td>{{ $row->potential_injurytos_description  }}</td>
                    <td>{{ $row->injuredvictim_name  }}</td>
                    <td>{{ $row->first_incident_reported_to }}</td>
                    <td>{{ $row->by_whom }}</td>
                    <td>{{ $row->first_aid_given_on_site }}</td>
                    {{-- <td>{{$row->incident_description}}</td> --}}
                    {{-- <td>{{$row->coworker_statement}}</td> --}}
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->formdata_17s_id}},'Project Manager')">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->formdata_17s_id}})">Delete</button>
                            {{-- Department Staff ,, current_role⁯_id   --}}
                            <button class="btn btn-warning btn-sm" wire:click="OpenEditCountryModal({{$row->formdata_17s_id}},'Project Head')"">Approve</button>
                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($form17data))
        {{ $form17data->links('livewire-pagination-links') }}
    @endif --}}

    @include('Forms.Forms_17.formdata17.add-modal')
    @include('Forms.Forms_17.formdata17.edit-modal')
    {{-- @include('Forms.Forms_17.formdata17.show-modal') --}}

</div>
