<div>
    @php $button_title = 'Add New Property Status' @endphp
    @php $data_not_found = 'No Property Status Data Found' @endphp


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
                <th>Property Status Description</th>
                <th>Property Status Abbr.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $propertystatuses as  $row )1
                <tr>
                    <td>{{ $row->propertystatus_id }}</td>
                    <td>{{ $row->propertystatus_description }}</td>
                    <td>{{ $row->propertystatus_abbr }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->propertystatus_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->propertystatus_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($propertystatuses))
        {{ $propertystatuses->links('livewire-pagination-links') }}
    @endif

    @include('baseconst.propertystatus.add-modal')
    @include('baseconst.propertystatus.edit-modal')

</div>
