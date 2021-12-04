<div>
    @php $button_title = 'Add New Probable Consequence' @endphp
    @php $data_not_found = 'No Probable Consequence Data Found' @endphp


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
                <th>Prob. conseq. Description</th>
                <th>Prob. conseq. Abbrivartion.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $probableconsequence as  $row )
                <tr>
                    <td>{{ $row->probable_consequence_id }}</td>
                    <td>{{ $row->probable_consequence_description  }}</td>
                    <td>{{ $row->probable_consequence_abbr }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->probable_consequence_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->probable_consequence_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($probableconsequence))
        {{ $probableconsequence->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.probableconsequence.add-modal')
    @include('Forms.Forms_01.probableconsequence.edit-modal')

</div>
