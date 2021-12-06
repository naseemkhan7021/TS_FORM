<div>
    @php $button_title = 'Add New Imd Correction ' @endphp
    @php $data_not_found = 'No Imd Correction Data Found' @endphp


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
                <th>Imd Correction  Description</th>
                <th>Imd Correction  Abbrivartion.</th>
                <th>Created Date</th>
                <th>Correction</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $imdcorrectiondata as  $row )
                <tr>
                    <td>{{ $row->imd_corrections_id }}</td>
                    <td>{{ $row->imd_corrections_description  }}</td>
                    <td>{{ $row->imd_corrections_abbr }}</td>
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->imd_corrections_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->imd_corrections_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($imdcorrectiondata))
        {{ $imdcorrectiondata->links('livewire-pagination-links') }}
    @endif --}}

    @include('Forms.Forms_15.imdcorrection.add-modal')
    @include('Forms.Forms_15.imdcorrection.edit-modal')

</div>
