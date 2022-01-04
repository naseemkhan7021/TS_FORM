<div>
    @php $button_title = 'Add New Document Index' @endphp
    @php $data_not_found = 'No Document Index Data Found' @endphp

    {{-- {{  $selectedProjectID }} --}}
    <div class="row">
        <div class="col-sm-8">
            {{-- <div class="text-sm-left">
                <button class="btn btn-danger waves-effect waves-light mb-2" wire:click="OpenAddCountryModal()"> {{ $button_title }} </button>
                <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
            </div> --}}
        </div>
        <div class="col-md-4">
            <input wire:model="searchQuery" type="text" placeholder="Search..." class="form-control mb-2" >
        </div>
    </div>

    <table class="table display table-bordered data-table" style="width:100%">
        <thead >
            <tr>
                <th>#</th>
                <th>Document Name</th>
                <th>Document Code.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $allDocuments as  $row )
                <tr>
                    <td>{{ $allDocuments->firstItem()+$loop->index }}</td>
                    <td>{{ $row->document_name  }}</td>
                    <td>{{ $row->document_code }}</td>
                    <td>{{ Carbon\Carbon::parse($row->created_at)->format(env('DATE_FORMAT1')) }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->ddd_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->ddd_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>

    @if (count($allDocuments))
        {{ $allDocuments->links('livewire-pagination-links') }}
    @endif

    @include('common-forms.documents.add-modal')
    @include('common-forms.documents.edit-modal')

</div>
