<div>
    @php $button_title = 'Add New Lead Follow  Up' @endphp
    @php $data_not_found = 'No Lead Follow  Up Data Found' @endphp


    <div class="row">
        <div class="col-sm-8">
            <div class="text-sm-left">
                <button class="btn btn-danger waves-effect waves-light mb-2" disabled wire:click="#"> {{ $button_title }} </button>
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
                <th>Follow Up Date</th>
                <th>ID.</th>
                <th>Lead Full Name.</th>
                <th>Current Status.</th>
                <th>Feed Back.</th>
                <th>Staff Name.</th>
                <th>Start Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $leadfollowdata as  $row )

                {{-- @if ( $row->bactive2 != '0') --}}

                <tr>
                    <td>{{ $row->iFollowUpID }}</td>
                    <td>{{ $row->nextfollowup_dt }}</td>
                    <td wire:click="CutomerActivity({{ $row->lead_id_FK }},'{{ $row->full_name }}')"> {{ $row->lead_id_FK }}</td>

                    <td wire:click="CutomerActivity({{  $row->lead_id_FK  }},'{{ $row->full_name }}')" style="cursor:pointer;color:green;"> {{ $row->full_name }} </td>
                    {{-- <td>{{ $row->full_name }}</td> --}}
                    <td>{{ $row->leadstatus_description  }}</td>
                    <td>{{ $row->staff_description }}</td>
                    <td>{{ $row->name }}</td>
                    {{-- <td>{{ $row->bactive2 }}</td> --}}

                    <td>{{ $row->created_at }}</td>


                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->iFollowUpID}})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->iFollowUpID}})">Delete</button>

                        </div>
                    </td>

                </tr>
                {{-- @endif --}}

            @empty
                <tr><td colspan="5">'{{ $data_not_found }}</td></tr>
            @endforelse

        </tbody>
    </table>
    @if (count($leadfollowdata))
        {{ $leadfollowdata->links('livewire-pagination-links') }}
    @endif

    @include('crmsales.leadfollowup.lead_timeline')
    @include('crmsales.leadfollowup.edit-modal')
    {{-- @include('crmsales.leads.add-modal') --}}











</div>
