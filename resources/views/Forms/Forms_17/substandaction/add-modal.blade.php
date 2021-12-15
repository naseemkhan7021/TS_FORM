<div class="modal fade addSubstandaction" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Substand Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">

                     <div class="form-group">
                         <label for="">Substand Action Description</label>
                         <input type="text" class="form-control" placeholder="Substand Action Description" wire:model="substandaction_description">
                         <span class="text-danger"> @error('substandaction_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Substand Action Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Substand Action Abbrivation" wire:model="substandaction_abbr">
                         <span class="text-danger"> @error('substandaction_abbr') {{ $message }}@enderror</span>
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
