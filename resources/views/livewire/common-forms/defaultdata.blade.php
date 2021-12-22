<div>
    @php $button_title = 'Add New Default Data' @endphp
    @php $data_not_found = 'No Default Data Found' @endphp
    @php($AddWarningMassege = 'If_Want_Another_Data_Than_First_Delete_Below_Data')

    <div class="row">
        <div class="col-sm-8">
            <div class="text-sm-left">
                <button {{$addDefaultdata == false ? "disabled title={$AddWarningMassege}" : ''}}  class="btn btn-danger waves-effect waves-light mb-2" wire:click="OpenAddCountryModal()"> {{ $button_title }} </button>
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
                <th>Company Name</th>
                <th>Department Name</th>
                <th>Project Name</th>
                <th>Description</th>

                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $formsDefaultdata as  $row )
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $row->sbc_company_name }}</td>
                    <td>{{ $row->sdepartment_name }}</td>
                    <td>{{ $row->sproject_name }}</td>
                    <td>{{ $row->description}}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->idefault_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->idefault_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="8">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>


    @include('common-forms.defaultdata.add-modal')
    @include('common-forms.defaultdata.edit-modal')

</div>
