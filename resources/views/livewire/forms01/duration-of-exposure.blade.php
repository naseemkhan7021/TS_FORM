<div>
    @php $button_title = 'Add New Duration of exposure' @endphp
    @php $data_not_found = 'No Duration of exposure Data Found' @endphp


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
                <th>Dur. Of Exposure Descri</th>
                <th>Dur. Of Exposure Abbrivartion</th>
                <th>Dur. Of Exposure value</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $durationofexposure as  $row )
                <tr>
                    <td>{{ $row->duration_of_exposure_id }}</td>
                    <td>{{ $row->duration_of_exposure_description  }}</td>
                    <td>{{ $row->duration_of_exposure_abbr }}</td>
                    <td>{{ $row->duration_of_exposure_value }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->duration_of_exposure_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->duration_of_exposure_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="15">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($durationofexposure))
        {{ $durationofexposure->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.durationofexposure.add-modal')
    @include('Forms.Forms_01.durationofexposure.edit-modal')

</div>
