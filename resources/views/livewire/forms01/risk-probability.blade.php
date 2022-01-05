<div>
    @php $button_title = 'Add New Risk Probability' @endphp
    @php $data_not_found = 'No Risk Probabilit Data Found' @endphp


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
                <th>Risk Probability Description</th>
                <th>Risk Probability Abbrivartion</th>
                <th>Risk Probability Value</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $riskprobability as  $row )
                <tr>
                    <td>{{ $row->risk_probability_id }}</td>
                    <td>{{ $row->risk_probability_description  }}</td>
                    <td>{{ $row->risk_probability_abbr }}</td>
                    <td>{{ $row->risk_probability_value }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->risk_probability_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->risk_probability_id}})">Delete</button>

                        </div>
                    </td>

                </tr>

            @empty
                <tr><td colspan="15">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($riskprobability))
        {{ $riskprobability->links('livewire-pagination-links') }}
    @endif

    @include('Forms.Forms_01.riskprobability.add-modal')
    @include('Forms.Forms_01.riskprobability.edit-modal')

</div>
