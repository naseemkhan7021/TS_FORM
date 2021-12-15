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

    <table class="table display table-bordered data-table text-center" style="width:100%">
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
            <tr style="overflow: hidden;">
                <td>{{ $row->ibc_id }}</td>
                <td>{{ $row->sbc_company_name }}</td>
                <td>{{ $row->sbc_abbr }}</td>
                    {{-- show imgs start --}}
                    <td>
                        
                        @if ($row->sbc_logo_small && Storage::disk()->exists($row->sbc_logo_small))
                        <a data-toggle="modal" data-target="#imgview" wire:click="$set('showimg','{{$row->sbc_logo_small}}')" style="height: 2rem" href="javascript:void(0)" class="d-block text-center"> <img class="h-100" src="{{Storage::url($row->sbc_logo_small)}}" alt="{{Storage::url($row->sbc_logo_small)}}"></a>
                        @else
                        No Image Selected
                        @endif
                    </td>
                    <td>
                        @if ($row->sbc_logo_large && Storage::disk()->exists($row->sbc_logo_large))
                        <a data-toggle="modal" data-target="#imgview" wire:click="$set('showimg','{{$row->sbc_logo_large}}')" style="height: 2rem" href="javascript:void(0)" class="d-block text-center"> <img class="h-100" src="{{Storage::url($row->sbc_logo_large)}}" alt="{{Storage::url($row->sbc_logo_large)}}"></a>
                        @else
                        No Image Selected
                        @endif
                    </td>
                    {{-- show imgs end --}}
                    
                    {{-- <td>{{ $row->sbc_logo_large }}</td> --}}
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
    {{-- {{ $showimg}} --}}
    <x-img-view-model :imgdata="$showimg" />
    
    @include('common-forms.company.add-modal')
    @include('common-forms.company.edit-modal')
    
</div>
