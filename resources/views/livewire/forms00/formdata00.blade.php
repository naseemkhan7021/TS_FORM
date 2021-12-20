<div>
    @php $button_title = 'Add New Section Index' @endphp
    @php $data_not_found = 'No Section Index Data Found' @endphp


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
                <th>Document Name</th>
                <th>Document Code.</th>
                <th>Counter</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $formdata00 as  $row )
                <tr>
                    <td>{{ $row->sr_no }}</td>
                    <td>{{ $row->document_name  }}</td>
                    <td>{{ $row->document_code }}</td>
                    <td>{{ $row->counter }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->activity_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->activity_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($formdata00))
        {{ $formdata00->links('livewire-pagination-links') }}
    @endif --}}

    @include('Forms.Forms_00.formdata00.add-modal')
    @include('Forms.Forms_00.formdata00.edit-modal')

</div>
