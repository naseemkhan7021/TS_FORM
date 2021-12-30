<div>
    @php $button_title = 'Add New Probability' @endphp
    @php $data_not_found = 'No Probability Data Found' @endphp
 
 
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
                <th> Value</th>
                <th> Description</th>
                <th> Abbrivartion</th>
                <th> Detail</th>
                <th style="width: 12%;">Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $probabilityData as  $row )
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $row->probability_value }}</td>
                    <td>{{ $row->probability_description  }}</td>
                    <td>{{ $row->probability_abbr }}</td>
                    <td>{{ $row->probability_detail }}</td>
                    <td>{{  Carbon\Carbon::parse($row->created_at)->format(env('DATE_FORMAT1')) }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->probability_id}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->probability_id}})">Delete</button>
 
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse
 
        </tbody>
    </table>
    @if (count($probabilityData))
        {{ $probabilityData->links('livewire-pagination-links') }}
    @endif
 
    @include('Forms.Forms_66.probability.add-modal')
    @include('Forms.Forms_66.probability.edit-modal')
 
 </div>
 