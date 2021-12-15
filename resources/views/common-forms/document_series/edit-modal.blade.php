<div class="modal fade editDocument" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit / Update  Document Series</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input type="hidden" wire:model="cid">

                     <div class="form-group">
                        <label for="">Document Description</label>
                        <input type="text" class="form-control" placeholder="Document Description" wire:model="upd_document_description">
                        <span class="text-danger"> @error('upd_document_description') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Issue No</label>
                        <input type="text" class="form-control" placeholder="Issue No" wire:model="upd_issue_no">
                        <span class="text-danger"> @error('upd_issue_no') {{ $message }}@enderror</span>
                    </div>

                   <div class="form-group">
                       <label for="">Issue Date</label>
                       <input type="date" class="form-control" placeholder="Issue Date" wire:model="upd_issue_dt">
                       <span class="text-danger"> @error('upd_issue_dt') {{ $message }}@enderror</span>
                   </div>
                   <div class="form-group">
                       <label for="">Revision No</label>
                       <input type="text" class="form-control" placeholder="Revision No" wire:model="upd_revision_no">
                       <span class="text-danger"> @error('upd_revision_no') {{ $message }}@enderror</span>
                   </div>

                   <div class="form-group">
                       <label for="">Revision Date</label>
                       <input type="date" class="form-control" placeholder="Revision Date" wire:model="upd_revision_date">
                       <span class="text-danger"> @error('upd_revision_date') {{ $message }}@enderror</span>
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
