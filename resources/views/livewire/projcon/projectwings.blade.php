<div>
    @php $button_title = 'Add New Projects Wings & Floors' @endphp
    @php $data_not_found = 'No Projects Wings & Floors Data Found' @endphp


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
                <th>Projects Name</th>
                <th>Location.</th>
                <th>Wing Description.</th>
                <th>Wing Abbr.</th>
                <th>No.of Floors.</th>
                <th>No.of Flats.</th>
                <th>Shops.</th>
                <th>Office.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $projectwings as  $row )
                <tr>
                    <td>{{ $row->iProjectWingID }}</td>
                    <td>{{ $row->sProjectName  }}</td>
                    <td>{{ $row->sLocation  }}</td>
                    <td>{{ $row->sWingDescription }}</td>
                    <td>{{ $row->sWingAbbr }}</td>
                    <td>{{ $row->iFloors }}</td>
                    <td>{{ $row->iUnitsperfloor }}</td>
                    <td>{{ $row->iShopsW }}</td>
                    <td>{{ $row->iOfficeW }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->iProjectWingID}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->iProjectWingID}})">Delete</button>
                            <button class="btn btn-info btn-sm" wire:click="GenerateUnits({{$row->iProjectWingID}})">Generate Units</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($projectwings))
        {{ $projectwings->links('livewire-pagination-links') }}
    @endif --}}

    @include('projcon.projectwings.add-modal')
    @include('projcon.projectwings.edit-modal')
    @include('projcon.projectwings.generateunit-modal')

</div>
