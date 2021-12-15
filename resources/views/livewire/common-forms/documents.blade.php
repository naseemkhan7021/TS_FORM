<div>
    @php $button_title = 'Add New Document Serial' @endphp
    @php $data_not_found = 'No Document Serial Data Found' @endphp


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
                <th>Document Description</th>
                <th>Issue No.</th>
                <th>Issue Date</th>
                <th>Revision No.</th>
                <th>Revision Date</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $formsDocuments as  $row )
                <tr>
                    <td>{{ $row->document_id }}</td>
                    <td>{{ $row->document_description }}</td>
                    <td>{{ $row->issue_no }}</td>
                    <td>{{ $row->issue_dt }}</td>
                    <td>{{ $row->revision_no }}</td>
                    <td>{{ $row->revision_date }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->document_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->document_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="8">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>


    @include('common-forms.document_series.add-modal')
    @include('common-forms.document_series.edit-modal')

</div>


