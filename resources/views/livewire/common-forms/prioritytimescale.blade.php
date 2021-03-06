<div>
    @php $button_title = 'Add New Priority 2 Timescale ' @endphp
    @php $data_not_found = 'No Priority 2 Timescale Data Found' @endphp


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
                <th>Priority 2 Timescale </th>
                <th>Priority 2 Timescale Abbr.</th>
                <th>Value.</th>

                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $prioritytimescalesdata as  $row )
                <tr>
                    <td>{{ $row->prioritytimescales_id }}</td>
                    <td>{{ $row->prioritytimescales_desc }}</td>
                    <td>{{ $row->prioritytimescales_abbr }}</td>
                    <td>{{ $row->pt_value }}</td>


                    <td>{{ Carbon\Carbon::parse($row->created_at)->format(env('DATE_FORMAT1')) }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->prioritytimescales_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->prioritytimescales_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="8">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>


    @include('common-forms.prioritytimescale.add-modal')
    @include('common-forms.prioritytimescale.edit-modal')

</div>
