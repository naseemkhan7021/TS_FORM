<div>
    @php $button_title = 'Add New Leads' @endphp
    @php $data_not_found = 'No Leads Data Found' @endphp


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
                <th>Leads Name</th>
                <th>last Name.</th>
                <th>Mobile No.</th>
                <th>Lead Status.</th>
                <th>Req. Units.</th>
                <th>Lead Source.</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $leads as  $row )
                <tr>
                    <td>{{ $row->lead_id }}</td>
                    <td>{{ $row->full_name }}</td>
                    <td>{{ $row->last_name  }}</td>
                    <td>{{ $row->mobile }}</td>
                    <td>{{ $row->leadstatus_description }}</td>

                    <td>
                        {{-- preg_split("/\,/",$row->required_sales_unit) --}}
                        {{-- @php --}}
                        {{-- //    {{ $this->leadstatus }} --}}
                        {{-- //    fore --}}
                        {{-- @endphp --}}


                        @forelse ($salesunits as $row2 )
                        @if ( strpos( ",".$row->required_sales_unit , $row2->salesunit_id ))
                            {{ $row2->salesunit_description }};
                        @endif
                        @empty
                            nan
                        @endforelse


                    </td>
                    <td>{{ $row->source_description }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->lead_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->lead_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($leads))
        {{ $leads->links('livewire-pagination-links') }}
    @endif

    @include('crmsales.leads.edit-modal')
    @include('crmsales.leads.add-modal')







</div>
