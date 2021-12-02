<div>
    @php $button_title = 'Add New Administrative Control Preventive' @endphp
    @php $data_not_found = 'No Administrative Control Preventive Data Found' @endphp




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
                <th>Admin. Ctrl. Preventive Description</th>
                <th>Admin. Ctrl. Preventive Abbrivartion.</th>
                <th>Admin. Ctrl. Preventive Value.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $activitydata as  $row )
                <tr>
                    <td>{{ $row->administrative_control_preventive_id }}</td>
                    <td>{{ $row->administrative_control_preventive_description  }}</td>
                    <td>{{ $row->administrative_control_preventive_abbr }}</td>
                    <td>{{ $row->administrative_control_preventive_value }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->administrative_control_preventive_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->administrative_control_preventive_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($activitydata))
        {{ $activitydata->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.activity.add-modal')
    @include('Forms.Forms_01.activity.edit-modal')

</div>







