<div>
   @php $button_title = 'Add New Environmental Impact' @endphp
   @php $data_not_found = 'No Environmental Impact Data Found' @endphp


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
           @forelse ( $environmentailimpactData as  $row )
               <tr>
                   <td>{{ ++$loop->index }}</td>
                   <td>{{ $row->environmental_impact_value }}</td>
                   <td>{{ $row->environmental_impact_description  }}</td>
                   <td>{{ $row->environmental_impact_abbr }}</td>
                   <td>{{ $row->environmental_impact_detail }}</td>
                   <td>{{  Carbon\Carbon::parse($row->created_at)->format(env('DATE_FORMAT1')) }}</td>
                   <td>
                       <div class="btn-group">
                           <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$row->environmental_impact_id}})">Edit</button>
                           <button class="btn btn-danger btn-sm" wire:click="deleteConfirm({{$row->environmental_impact_id}})">Delete</button>

                       </div>
                   </td>
               </tr>
           @empty
               <tr><td colspan="15">'{{ $data_not_found }}</td></tr>
           @endforelse

       </tbody>
   </table>
   @if (count($environmentailimpactData))
       {{ $environmentailimpactData->links('livewire-pagination-links') }}
   @endif

   @include('Forms.Forms_66.environmentalimpact.add-modal')
   @include('Forms.Forms_66.environmentalimpact.edit-modal')

</div>
