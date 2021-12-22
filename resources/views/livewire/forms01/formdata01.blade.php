@php
if ($iproject_id_fk) {
    # code...
    $sproject_location_obj = DB::table('projects')
        ->where('iproject_id', '=', $iproject_id_fk)
        ->get();
    $this->sproject_location = $sproject_location_obj[0]->sproject_location;
}
@endphp

<div>
    @php $button_title = 'Add New Hira' @endphp
    @php $data_not_found = 'No Hira Data Found' @endphp


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


    <table class="table display table-bordered data-table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>B_Activity</th>
                <th>C_Sub_Activity</th>
                <th>E_Potential_Hazard</th>
                <th>F_Probable_Consequence</th>
                <th>G_Causes</th>
                <th>I_Consequences_Controls</th>
                <th>V_Risk_Acceptable_Non_Acceptable</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $formdata01 as  $row )
                <tr>
                    <td>{{ $formdata01->firstItem()+$loop->index}}</td>
                    <td>{{ $row->activity_description  }}</td>
                    <td>{{ $row->sub_activity_description  }}</td>
                    <td>{{ $row->potential_hazard_description  }}</td>
                    <td>{{ $row->probable_consequence_description  }}</td>
                    <td>{{ $row->causes_description  }}</td>
                    <td>{{ $row->consequences_controls_description  }}</td>
                    <td>{{ $row->V_risk_acceptable_non_acceptable  }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->formdata_01s_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->formdata_01s_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($formdata01))
        {{ $formdata01->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.formdata01.add-modal')
    {{-- @include('Forms.Forms_01.activity.edit-modal') --}}

</div>
