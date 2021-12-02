<div>
    @php $button_title = 'Add New Projects' @endphp
    @php $data_not_found = 'No Projects Data Found' @endphp


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
                <th>Unit</th>
                <th>Wing.</th>
                <th>Unit Type.</th>
                <th>Carpet Area.</th>
                <th>Build Up Area</th>
                <th>Open Area.</th>
                <th>Stamp Duty.</th>
                <th>Total CA. sq.ft.</th>
                <th>OTLA.</th>
                <th>Total Area</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @forelse ( $projectunits as  $row )
                <tr>
                   <td>{{ $row->iID }}</td>
                    <td>{{ $row->sManagementUnitID   }}</td>
                    <td>{{ $row->sWingDescription }}</td>
                    <td>{{ $row->salesunit_description }}</td>

                    <td>{{ $row->iCarpetArea_sqmt }}</td>
                    {{-- <td>{{ $row->iBuildUpFormula }}</td> --}}
                    <td>{{ $row->iBuildArea_sqmt }}</td>

                    <td>{{ $row->iOpenArea  }}</td>
                    <td>{{ $row->iStampDutyArea }}</td>
                    {{-- <td>{{ $row->iStampDutyArea2 }}</td> --}}
                    <td>{{ number_format($row->iTotalCarpetArea_sqft,0) }}</td>

                    <td>{{ number_format($row->iOtla_Area,0) }}</td>
                    <td>{{ number_format($row->iTotalArea_sqft,0) }}</td>

                    <td>{{ $row->created_at }}</td>
                   <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->iID}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->iID}})">Delete</button>

                        </div>
                    </td>

                </tr>

                @empty
                    <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
                @endforelse

            </tbody>
        </table>
        {{-- @if (count($projectunits))
            {{ $projectunits->links('livewire-pagination-links') }}
        @endif --}}



    @include('projcon.projectunit.add-modal')
    @include('projcon.projectunit.edit-modal')

</div>
