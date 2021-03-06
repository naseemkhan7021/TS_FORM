<div>
    @php $button_title = 'Add New Engineering Control' @endphp
    @php $data_not_found = 'No Engineering Controls Data Found' @endphp


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
                <th>Engineering Ctrl Desc.</th>
                <th>Engineering Ctrl Abbriv.</th>
                <th>Engineering Ctrl Value</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $engineeringcontrol as  $row )
                <tr>
                    <td>{{ $row->engineering_control_id }}</td>
                    <td>{{ $row->engineering_control_description  }}</td>
                    <td>{{ $row->engineering_control_abbr }}</td>
                    <td>{{ $row->engineering_control_value }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->engineering_control_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->engineering_control_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="15">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($engineeringcontrol))
        {{ $engineeringcontrol->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.engineeringcontrol.add-modal')
    @include('Forms.Forms_01.engineeringcontrol.edit-modal')

</div>
