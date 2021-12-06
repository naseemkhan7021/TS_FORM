<div class="modal fade editPotentialhazard" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update  Potentialhazard </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input type="hidden" wire:model="cid">

                     <div class="form-group">
                         <label for="">Potentialhazard Description</label>
                         <input type="text" class="form-control" placeholder="Potentialhazard Description" wire:model="upd_potential_hazard_description">
                         <span class="text-danger"> @error('upd_potential_hazard_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Potentialhazard Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Potentialhazard Abbrivation" wire:model="upd_potential_hazard_abbr">
                         <span class="text-danger"> @error('upd_potential_hazard_abbr') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                     </div>
                 </form>

            </div>
        </div>
    </div>
</div>
