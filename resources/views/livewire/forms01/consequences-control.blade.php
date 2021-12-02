<div>
    @php $button_title = 'Add New  Consequences Ctrl.' @endphp
    @php $data_not_found = 'No  Consequences Ctrl. Data Found' @endphp

    Consequences Ctrl.
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
                <th> Consequences Ctrl. Description</th>
                <th> Consequences Ctrl. Abbrivartion.</th>
                <th> Created Date </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $activitydata as  $row )
                <tr>
                    <td>{{ $row->consequences_controls_id }}</td>
                    <td>{{ $row->consequences_controls_description  }}</td>
                    <td>{{ $row->consequences_controls_abbr }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->consequences_controls_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->consequences_controls_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
            @endforelse

        </tbody>
    </table>
    @if (count($activitydata))
        {{ $activitydata->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.activity.add-modal')
    @include('Forms.Forms_01.activity.edit-modal')

</div>
