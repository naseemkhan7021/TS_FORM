<div>
    @php $button_title = 'Add New Channel Partner' @endphp
    @php $data_not_found = 'No Channel Partner Data Found' @endphp


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
                <th>Channel Partner Name</th>
                <th>Mobile No.</th>
                <th>Email ID.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $cpartners as  $row )
                <tr>
                    <td>{{ $row->channelpartner_id }}</td>
                    <td>{{ $row->cp_first_name . ' ' . $row->cp_middle_name . ' ' .  $row->cp_last_name }}</td>
                    <td>{{ $row->cp_mobile }}</td>
                    <td>{{ $row->cp_email }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->channelpartner_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->channelpartner_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($cpartners))
        {{ $cpartners->links('livewire-pagination-links') }}
    @endif

    @include('baseconst.channelpartner.add-modal')
    @include('baseconst.channelpartner.edit-modal')

</div>
