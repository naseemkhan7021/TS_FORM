@php
if ($iproject_id_fk) {
    # code...
    $sproject_location_obj = DB::table('projects')
        ->where('iproject_id', '=', $iproject_id_fk)
        ->get();
    $this->sproject_location = $sproject_location_obj[0]->sproject_location;
}
@endphp


<div>
    @php $button_title = 'Add New Header' @endphp
    @php $data_not_found = 'No Headers Data Found' @endphp


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
                <th>Project</th>
                <th>Contractor Name</th>
                <th>Faculty Name</th>
                <th>Venue</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $headerdata as  $row )
                <tr>
                    <td>{{ $row->formdata_22s_id }}</td>
                    <td>{{ $row->sproject_name  }}</td>
                    <td>{{ $row->contractor_name }}</td>
                    <td>{{ $row->faculty_name  }}</td>
                    <td>{{ $row->venue  }}</td>
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->formdata_22s_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->formdata_22s_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="7">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>

    @include('Forms.Forms_22.header.add-modal')
    @include('Forms.Forms_22.header.edit-modal')

</div>
