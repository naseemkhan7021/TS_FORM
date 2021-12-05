<div>
    @php $button_title = 'Add New Potentialhazard' @endphp
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
                <th>Potentialhazard Description</th>
                <th>Potentialhazard Abbrivartion.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $potentialhazard as  $row )
                <tr>
                    <td>{{ $row->potential_hazard_id }}</td>
                    <td>{{ $row->potential_hazard_description  }}</td>
                    <td>{{ $row->potential_hazard_abbr }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->potential_hazard_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->potential_hazard_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($potentialhazard))
        {{ $potentialhazard->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.potentialhazard.add-modal')
    @include('Forms.Forms_01.potentialhazard.edit-modal')

</div>
