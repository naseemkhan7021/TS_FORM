<div>
    @php $button_title = 'Add New Payment Schdule Template' @endphp
    @php $data_not_found = 'No Payment Schdule Template Data Found' @endphp


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
                <th>Payment Schedule Description</th>
                <th>Remarks.</th>
                <th>Percentage.</th>
                <th>Amount.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $paytemplate as  $row )
                <tr>
                    <td>{{ $row->templatehead_ID }}</td>
                    <td>{{ $row->stemplatedescription  }}</td>
                    <td>{{ $row->sdetails }}</td>
                    <td>{{ $row->mPercentage }}</td>
                    <td>{{ $row->mAmount }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->templatehead_ID}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->templatehead_ID}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="6">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    {{-- @if (count($paytemplate))
        {{ $paytemplate->links('livewire-pagination-links') }}
    @endif --}}

    @include('baseconst.templatepayment.add-modal')
    @include('baseconst.templatepayment.edit-modal')

</div>
