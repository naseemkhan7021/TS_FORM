<div>
    @php $button_title = 'Add New Primary Member' @endphp
    @php $data_not_found = 'No Primary Member Data Found' @endphp


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
                <th>Member Name</th>
                <th>last Name</th>
                <th>Aadhaar Cart</th>
                <th>Pan Card</th>
                <th>Units.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ( $primarymemberdata as  $row )
                <tr>
                    <td>{{ $row->iMemberID }}</td>
                    <td>{{ $row->sMember_FullName }}</td>
                    <td>{{ $row->sMember_LastName  }}</td>
                    <td>{{ $row->sAadhaarCard }}</td>
                    <td>{{ $row->sPanCard }}</td>
                    <td>{{ $row->sManagementUnitID }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->iMemberID}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->iMemberID}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="8">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>


    @include('crmsales.primarymember.add-modal')
    @include('crmsales.primarymember.edit-modal')


</div>
