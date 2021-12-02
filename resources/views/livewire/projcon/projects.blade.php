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
                <th>Projects Name</th>
                <th>Location.</th>
                <th>Rera ID.</th>
                <th>Start Date.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $projects as  $row )
                <tr>
                    <td>{{ $row->ProjectID }}</td>
                    <td>{{ $row->sProjectName  }}</td>
                    <td>{{ $row->sLocation }}</td>
                    <td>{{ $row->sReraID }}</td>
                    <td>{{ $row->dtStart }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->ProjectID}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->ProjectID}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($projects))
        {{ $projects->links('livewire-pagination-links') }}
    @endif

    @include('projcon.projects.add-modal')
    @include('projcon.projects.edit-modal')

</div>
