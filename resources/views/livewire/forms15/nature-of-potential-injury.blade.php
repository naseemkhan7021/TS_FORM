<div>
    @php $button_title = 'Add New Nature Of Potential Injuries ' @endphp
    @php $data_not_found = 'No Nature Of Potential Injuries Data Found' @endphp


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
                <th>Nature Of Potential Injuries  Description</th>
                <th>Nature Of Potential Injuries  Abbrivartion.</th>
                <th>Created Date</th>
                <th>Correction</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $natureofpotentialinjurydata as  $row )
                <tr>
                    <td>{{ $row->nature_of_potential_injuries_id }}</td>
                    <td>{{ $row->nature_of_potential_injuries_description  }}</td>
                    <td>{{ $row->nature_of_potential_injuries_abbr }}</td>
                    <td>{{ $row->updated_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->nature_of_potential_injuries_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->nature_of_potential_injuries_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($natureofpotentialinjurydata))
        {{ $natureofpotentialinjurydata->links('livewire-pagination-links') }}
    @endif --}}

    @include('Forms.Forms_15.natureofpotentialinjury.add-modal')
    @include('Forms.Forms_15.natureofpotentialinjury.edit-modal')

</div>
