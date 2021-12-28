<div>
    @php $button_title = 'Add New Duration of Impact' @endphp
    @php $data_not_found = 'No Duration of Impact Data Found' @endphp


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
                <th>Duration of Impact Value</th>
                <th>Duration of Impact Description</th>
                <th>Duration of Impact Abbrivartion</th>
                <th>Duration of Impact Detail</th>
                <th style="width: 12%;">Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $durationimpacatData as  $row )
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $row->duration_of_impact_value }}</td>
                    <td>{{ $row->duration_of_impact_description  }}</td>
                    <td>{{ $row->duration_of_impact_abbr }}</td>
                    <td>{{ $row->duration_of_impact_detail }}</td>
                    <td>{{  Carbon\Carbon::parse($row->created_at)->format(env('DATE_FORMAT1')) }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->duration_of_impact_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->duration_of_impact_id}})">Delete</button>

                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($durationimpacatData))
        {{ $durationimpacatData->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_66.durationofimpact.add-modal')
    @include('Forms.Forms_66.durationofimpact.edit-modal')

</div>
