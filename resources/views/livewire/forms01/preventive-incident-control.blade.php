<div>
    @php $button_title = 'Add New Preventive Incident Control' @endphp
    @php $data_not_found = 'No Activities Data Found' @endphp


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
                <th>Preventive Inci. Ctrl Desc.</th>
                <th>Preventive Inci. Ctrl Abbriv.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $preventiveincidentcontrol as  $row )
                <tr>
                    <td>{{ $row->preventive_incident_control_id }}</td>
                    <td>{{ $row->preventive_incident_control_description  }}</td>
                    <td>{{ $row->preventive_incident_control_abbr }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->preventive_incident_control_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->preventive_incident_control_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($preventiveincidentcontrol))
        {{ $preventiveincidentcontrol->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.preventiveincidentcontrol.add-modal')
    @include('Forms.Forms_01.preventiveincidentcontrol.edit-modal')

</div>
