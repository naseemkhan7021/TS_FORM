<div class="modal fade editPrioritytimescale" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update  Priority 2 Timescale </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input type="hidden" wire:model="cid">

                     <div class="form-group">
                        <label for=""> Priority 2 Timescale </label>
                        <input type="text" class="form-control" placeholder="Priority 2 Timescale" wire:model="upd_prioritytimescales_desc">
                        <span class="text-danger"> @error('upd_prioritytimescales_desc') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Priority 2 Timescale Abbrivation</label>
                        <input type="text" class="form-control" placeholder="PIT Abbrivation" wire:model="upd_prioritytimescales_abbr">
                        <span class="text-danger"> @error('upd_prioritytimescales_abbr') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Value</label>
                        <input type="text" class="form-control" placeholder="Value" wire:model="upd_pt_value">
                        <span class="text-danger"> @error('upd_pt_value') {{ $message }}@enderror</span>
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
