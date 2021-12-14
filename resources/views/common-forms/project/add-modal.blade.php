<div class="modal fade addGender" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Gender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">
                     {{-- <div class="form-group">
                         <label for="">Continent</label>
                         <select class="form-control" wire:model="continent">
                               <option value="">No selected</option>
                               @foreach ($continents as $continent)
                                   <option value="{{ $continent->id }}">{{ $continent->continent_name }}</option>
                               @endforeach

                         </select>
                         <span class="text-danger"> @error('continent') {{ $message }}@enderror</span> --}}
                     {{-- </div> --}}
                     <div class="form-group">
                         <label for="">Gender Description</label>
                         <input type="text" class="form-control" placeholder="Gender Description" wire:model="gender_description">
                         <span class="text-danger"> @error('gender_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Gender Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Gender Abbrivation" wire:model="gender_abbr">
                         <span class="text-danger"> @error('gender_abbr') {{ $message }}@enderror</span>
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
