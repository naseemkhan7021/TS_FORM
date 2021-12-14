<div>
    @php $button_title = 'Add New Company' @endphp
    @php $data_not_found = 'No Company Data Found' @endphp


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
                <th>Company Name</th>
                <th>Company Abbr.</th>
                <th>Small Image</th>
                <th>large Image.</th>
                <th>Valid Date</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $formsCompany as  $row )
                <tr>
                    <td>{{ $row->ibc_id }}</td>
                    <td>{{ $row->sbc_company_name }}</td>
                    <td>{{ $row->sbc_abbr }}</td>
                    <td>{{ $row->sbc_logo_small }}</td>
                    <td>{{ $row->sbc_logo_large }}</td>
                    <td>{{ $row->validupto_dt }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->ibc_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->ibc_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="8">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>


    @include('common-forms.company.add-modal')
    @include('common-forms.company.edit-modal')

</div>
