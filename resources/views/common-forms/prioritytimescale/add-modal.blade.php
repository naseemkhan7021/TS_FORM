<div class="modal fade addPrioritytimescale " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Priority 2 Timescale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">

                     <div class="form-group">
                         <label for=""> Priority 2 Timescale </label>
                         <input type="text" class="form-control" placeholder="Priority 2 Timescale" wire:model="prioritytimescales_desc">
                         <span class="text-danger"> @error('prioritytimescales_desc') {{ $message }}@enderror</span>
                     </div>

                     <div class="form-group">
                         <label for="">Priority 2 Timescale Abbrivation</label>
                         <input type="text" class="form-control" placeholder="Priority 2 Timescale Abbrivation" wire:model="prioritytimescales_abbr">
                         <span class="text-danger"> @error('prioritytimescales_abbr') {{ $message }}@enderror</span>
                     </div>

                     <div class="form-group">
                        <label for="">Value</label>
                        <input type="text" class="form-control" placeholder="Value" wire:model="pt_value">
                        <span class="text-danger"> @error('pt_value') {{ $message }}@enderror</span>
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
