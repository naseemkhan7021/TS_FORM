<div class="modal fade addSubcause" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Sub Cause</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">
                     <div class="form-group">
                         <label for="">Sub Cause Description</label>
                         <input type="text" class="form-control" placeholder="Sub-cause Description" wire:model="sub_causes_description">
                         <span class="text-danger"> @error('sub_causes_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Sub Cause Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Sub-cause Abbrivation" wire:model="sub_causes_abbr">
                         <span class="text-danger"> @error('sub_causes_abbr') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="" class="form-label">Cause Description</label>
                          <select  wire:mode="sub_causes_fk" class="form-control">
                              <option value="0" hidden>Select main Cause</option>
                              @forelse ($cousesData as $item)
                                  <option value="{{$item->causes_id}}">{{$item->causes_description}}</option>
                              @empty

                              @endforelse
                              @error('sub_causes_fk')
                              {{$message}}
                          @enderror
                          </select>
                         {{-- <input type="text" class="form-control" placeholder="Sub-cause Abbrivation" wire:model="sub_causes_abbr">
                         <span class="text-danger"> @error('sub_causes_abbr') {{ $message }}@enderror</span> --}}
                     </div>
                     <div class="form-group">
                         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-sm">Save</button>
                     </div>

                 </form>

            </div>
        </div>
    </div>
</div>
