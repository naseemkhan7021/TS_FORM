<div class="modal fade addDocumentA" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="">Document Name</label>
                        <input type="text" class="form-control" placeholder="FIRE DOCUMENT" wire:model="document_name">
                        <span class="text-danger"> @error('document_name') {{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="">Document Code</label>
                            <input type="text" class="form-control" placeholder="e.x. EHS-123" wire:model="document_code">
                            <span class="text-danger"> @error('document_code') {{ $message }}@enderror</span>
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
