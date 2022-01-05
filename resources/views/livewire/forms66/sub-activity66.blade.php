<div>
    @php $button_title = 'Add New Sub Activities' @endphp
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
                <th>Sub Activities Description</th>
                <th>Sub Activities Abbrivartion.</th>
                <th>Activities Description</th>
                <th style="width: 12%;">Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $subactivitydata as  $row )
                <tr>
                    <td>{{ $row->sub_activity_id }}</td>
                    <td>{{ $row->sub_activity_description  }}</td>
                    <td>{{ $row->sub_activity_abbr }}</td>
                    <td>{{ $row->activity_description }}</td>
                    <td>{{  Carbon\Carbon::parse($row->created_at)->format(env('DATE_FORMAT1')) }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->sub_activity_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->sub_activity_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="15">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($subactivitydata))
        {{ $subactivitydata->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_66.subactivity.add-modal')
    @include('Forms.Forms_66.subactivity.edit-modal')

</div>
