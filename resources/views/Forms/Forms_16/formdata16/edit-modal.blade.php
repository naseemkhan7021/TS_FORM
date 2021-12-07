<div class="modal fade editForm1" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update  Form-16 Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input type="hidden" wire:model="cid">

                     <div class="form-group">
                         <label for="">Injured Victim Name</label>
                         <input type="text" class="form-control" placeholder="Injured Victim Name" wire:model="upd_injuredvictim_name">
                         <span class="text-danger"> @error('upd_injuredvictim_name') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Designation</label>
                         <input type="text" class="form-control" placeholder="Designation" wire:model="upd_designation">
                         <span class="text-danger"> @error('upd_designation') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Age</label>
                         <input type="text" class="form-control" placeholder="Age" wire:model="upd_age">
                         <span class="text-danger"> @error('upd_age') {{ $message }}@enderror</span>
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
