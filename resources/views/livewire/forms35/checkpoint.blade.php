<div>
    @php $button_title = 'Add New Checkpoint' @endphp
    @php $data_not_found = 'No Checkpoints Data Found' @endphp


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
                <th>checkpoint Description</th>
                <th>checkpoint Abbrivartion</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $checkpointsData as  $row )
                <tr>
                    <td>{{ $checkpointsData->firstItem()+$loop->index}}</td>
                    <td>{{ $row->form35_checkpoints_desc  }}</td>
                    <td>{{ $row->form35_checkpoints_abbr }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->form35_checkpoints_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->form35_checkpoints_id}})">Delete</button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    </div>
    @if (count($checkpointsData))
        {{ $checkpointsData->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_35.checkpoint.add-modal')
    @include('Forms.Forms_35.checkpoint.edit-modal')

</div>
