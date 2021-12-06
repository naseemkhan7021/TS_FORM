<div>
    @php $button_title = 'Add New Why was the unsefe act committed ' @endphp
    @php $data_not_found = 'No Why was the unsefe act committed Data Found' @endphp


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
                <th>Why unsafeact Committed  Description</th>
                <th>Why unsafeact Committed  Abbrivartion.</th>
                <th>Created Date</th>
                <th>Correction</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $whyunsafeactcommitteddata as  $row )
                <tr>
                    <td>{{ $row->whyunsafeact_committeds_id }}</td>
                    <td>{{ $row->whyunsafeact_committeds_description  }}</td>
                    <td>{{ $row->whyunsafeact_committeds_abbr }}</td>
                    <td>{{ $row->updated_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->whyunsafeact_committeds_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->whyunsafeact_committeds_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($whyunsafeactcommitteddata))
        {{ $whyunsafeactcommitteddata->links('livewire-pagination-links') }}
    @endif --}}

    @include('Forms.Forms_15.whyunsafeactcommitted.add-modal')
    @include('Forms.Forms_15.whyunsafeactcommitted.edit-modal')

</div>
