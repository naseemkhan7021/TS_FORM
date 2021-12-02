<div>
    @php $button_title = 'Add New Sales Unit' @endphp
    @php $data_not_found = 'No Sales Unit Data Found' @endphp


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
                <th>Sales Unit Description</th>
                <th>Sales Unit Abbr.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $salesunits as  $row )
                <tr>
                    <td>{{ $row->salesunit_id }}</td>
                    <td>{{ $row->salesunit_description }}</td>
                    <td>{{ $row->salesunit_abbr }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->salesunit_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->salesunit_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($salesunits))
        {{ $salesunits->links('livewire-pagination-links') }}
    @endif

    @include('baseconst.salesunit.add-modal')
    @include('baseconst.salesunit.edit-modal')

</div>
