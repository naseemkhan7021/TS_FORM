<div class="modal fade addDocument" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Document Series</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="save">

                     <div class="form-group">
                         <label for="">Document Description</label>
                         <input type="text" class="form-control" placeholder="Document Description" wire:model="document_description">
                         <span class="text-danger"> @error('document_description') {{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="">Issue No</label>
                         <input type="text" class="form-control" placeholder="Issue No" wire:model="issue_no">
                         <span class="text-danger"> @error('issue_no') {{ $message }}@enderror</span>
                     </div>

                    <div class="form-group">
                        <label for="">Issue Date</label>
                        <input type="date" class="form-control" placeholder="Issue Date" wire:model="issue_dt">
                        <span class="text-danger"> @error('issue_dt') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Revision No</label>
                        <input type="text" class="form-control" placeholder="Revision No" wire:model="revision_no">
                        <span class="text-danger"> @error('revision_no') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="">Revision Date</label>
                        <input type="date" class="form-control" placeholder="Revision Date" wire:model="revision_date">
                        <span class="text-danger"> @error('revision_date') {{ $message }}@enderror</span>
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
