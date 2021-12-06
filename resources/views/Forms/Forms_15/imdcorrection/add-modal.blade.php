<div class="modal fade addImdcorrection" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Imd. Correction </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">

                     <div class="form-group">
                         <label for="">Imd. Correction  Description</label>
                         <input type="text" class="form-control" placeholder="Imd. Correction  Description" wire:model="imd_corrections_description">
                         <span class="text-danger"> @error('imd_corrections_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Imd. Correction  Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Imd. Correction  Abbrivation" wire:model="imd_corrections_abbr">
                         <span class="text-danger"> @error('imd_corrections_abbr') {{ $message }}@enderror</span>
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
