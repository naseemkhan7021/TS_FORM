<div>
    @php $button_title = 'Add New Imd Action ' @endphp
    @php $data_not_found = 'No Imd Action Data Found' @endphp


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
                <th>Imd Action  Description</th>
                <th>Imd Action  Abbrivartion.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $imdactiondata as  $row )
                <tr>
                    <td>{{ $row->imd_actions_id }}</td>
                    <td>{{ $row->imd_actions_description  }}</td>
                    <td>{{ $row->imd_actions_abbr }}</td>
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->imd_actions_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->imd_actions_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($imdactiondata))
        {{ $imdactiondata->links('livewire-pagination-links') }}
    @endif --}}

    @include('Forms.Forms_15.imdaction.add-modal')
    @include('Forms.Forms_15.imdaction.edit-modal')

</div>
